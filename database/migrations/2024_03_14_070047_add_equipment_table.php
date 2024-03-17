<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->nullable();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('item_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('skill_id');
            $table->string('type', 30)->nullable();
            $table->string('type_class', 30)->nullable();
            $table->integer('min_lvl')->nullable();
            $table->integer('min_str')->nullable();
            $table->integer('min_agility')->nullable();
            $table->integer('min_intellect')->nullable();
            $table->integer('min_mudrost')->nullable();
            $table->integer('armor')->nullable();
            $table->integer('dodge')->nullable();
            $table->integer('intellect')->nullable();
            $table->integer('mudrost')->nullable();
            $table->integer('attack_mag')->nullable();
            $table->integer('min_attack')->nullable();
            $table->integer('max_attack')->nullable();
            $table->integer('hp')->nullable();
            $table->integer('mp')->nullable();
            $table->boolean('two_hand')->default(false);
            $table->integer('skill_lvl')->nullable();
            $table->string('weight')->nullable();
            $table->double('price')->nullable();

            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });

        Schema::table('location_item', function (Blueprint $table) {
            $table->string('number_location')->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_equipment');
        Schema::dropIfExists('skills');
        Schema::dropColumns('location_item', ['number_location']);
    }
}
