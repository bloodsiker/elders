<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('link')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
        });

        Schema::create('nps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location_number');
            $table->timestamps();
        });

        Schema::create('location_nps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nps_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();
            $table->foreign('nps_id')->references('id')->on('nps')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 50)->default('resource');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('item_artifact', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('hp')->nullable();
            $table->string('armor')->nullable();
            $table->string('dodge')->nullable();
            $table->string('attack')->nullable();
            $table->string('attack_mag')->nullable();
            $table->string('mp')->nullable();
            $table->string('intellect')->nullable();
            $table->string('mudrost')->nullable();
            $table->string('str')->nullable();
            $table->string('agility')->nullable();
            $table->string('lvl')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });

        Schema::create('location_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('location_id');
            $table->string('quantity')->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_nps');
        Schema::dropIfExists('location_item');
        Schema::dropIfExists('item_artifact');
        Schema::dropIfExists('items');
        Schema::dropIfExists('nps');
        Schema::dropIfExists('locations');
    }
}
