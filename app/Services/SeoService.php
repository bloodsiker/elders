<?php

namespace App\Services;

class SeoService
{
    private string $title = 'Elders - Легендарный клан';
    private string $description = 'Необычная текстовая онлайн игра с огромным загадочным фэнтези миром для нескончаемых исследований и приключений. Попробуйте и вас затянет невероятно!';
    private string $keywords = 'Карты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание';

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function addBeforeTitle(string $title): self
    {
        $this->title .= $title;

        return $this;
    }

    public function addAfterTitle(string $title): self
    {
        $this->title = $title . $this->title ;

        return $this;
    }
}
