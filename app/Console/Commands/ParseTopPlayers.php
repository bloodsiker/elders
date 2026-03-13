<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class ParseTopPlayers extends Command
{
    protected $signature   = 'parse:top-players';
    protected $description = 'Парсинг топ 50 игроков с рейтинга';

    public function handle(): void
    {
        $this->info('Загружаем страницу...');

        $response = Http::withOptions(['verify' => false])->get('http://s2.bbgam.com/best/?r=14');

        // Конвертируем cp1251 → utf-8
        $html = mb_convert_encoding($response->body(), 'UTF-8', 'CP1251');

        $crawler = new Crawler($html);

        $players = [];

        $crawler->filter('table tr')->each(function (Crawler $row) use (&$players) {
            if (count($players) >= 50) return;

            $cols = $row->filter('td');

            if ($cols->count() < 2) return;

            $rank = trim($cols->eq(0)->text());

            // Пропускаем заголовок
            if (!is_numeric($rank)) return;

            $name = trim($cols->eq(1)->text());

            $players[] = [
                'rank' => (int) $rank,
                'name' => $name,
            ];
        });

        if (empty($players)) {
            $this->error('Игроки не найдены. Возможно изменилась структура страницы.');
            return;
        }

        $this->table(['Место', 'Игрок'], array_map(fn($p) => [$p['rank'], $p['name']], $players));

        $this->info('Найдено игроков: ' . count($players));
    }
}
