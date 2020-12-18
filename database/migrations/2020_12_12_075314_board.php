<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Board extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('board', function (Blueprint $table) {
        $table->increments('board_id');
        $table->integer('board_comment_id')->default(0);
        $table->string('user');
        $table->string('tag');
        $table->string('title');
        $table->text('content');
        $table->date('date');
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
    }
}
