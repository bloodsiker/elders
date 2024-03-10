<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_boss')->default(false);
            $table->integer('lvl')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('dodge')->nullable();
            $table->integer('armor')->nullable();
            $table->integer('min_dmg')->nullable();
            $table->integer('max_dmg')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('monsters')
                ->onDelete('cascade');
        });

        Schema::create('location_monster', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('monster_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();
            $table->foreign('monster_id')->references('id')->on('monsters')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        Schema::create('monster_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('monster_id');
            $table->string('quantity')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('monster_id')->references('id')->on('monsters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monster_item');
        Schema::dropIfExists('location_monster');
        Schema::dropIfExists('monsters');
    }
}
