<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quest_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quest_category_id');
            $table->unsignedBigInteger('npc_id');
            $table->string('title');
            $table->text('reward')->nullable();
            $table->text('description');
            $table->smallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('quest_category_id')->references('id')->on('quest_categories')->onDelete('cascade');
            $table->foreign('npc_id')->references('id')->on('nps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quests');
        Schema::dropIfExists('quest_categories');
    }
}
