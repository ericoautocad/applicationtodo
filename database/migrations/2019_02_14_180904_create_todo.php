<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('todos', function(Blueprint $table){ 
            $table->engine = 'InnoDB';
            $table->increments('uuid');
            $table->string('type', 45);
            $table->string('content', 255);
            $table->integer('sort_order');
            $table->integer('done');
            $table->timestamp('date_created', 0)->nullable();
            $table->timestamp('date_updated', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('todos');
    }
}
