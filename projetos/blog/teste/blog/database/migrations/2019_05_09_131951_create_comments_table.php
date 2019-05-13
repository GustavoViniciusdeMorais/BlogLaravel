<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts');
            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        /*Schema::table('comments', function($table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['post_id']);
        Schema::dropIfExists('comments');
    }
}
