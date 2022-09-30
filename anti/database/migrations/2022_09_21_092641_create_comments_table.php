<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id')->comment('コメントID');
            $table->unsignedInteger('user_id')->comment('コメントユーザーID');
            $table->integer('article_id')->comment('記事ID');
            $table->text('body')->comment('コメント本文');
            $table->systemstamps();

            $table->index('user_id');
            $table->index('article_id');

            $table->foreign('article_id')->references('id')->on('articles')->deferrable()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->deferrable()->onDelete('cascade');
        });

        DB::statement("COMMENT ON TABLE comments is 'コメント'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
