<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_tasks');
    }
}
