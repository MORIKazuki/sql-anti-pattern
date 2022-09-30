<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaiveTreeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naive_tree_comments', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('コメントID');
            $table->integer('parent_comment_id')->nullable()->comment('親コメントID');
            $table->integer('reply_to_comment_id')->nullable()->comment('返信先コメントID');
            $table->unsignedInteger('user_id')->comment('コメントユーザーID');
            $table->integer('article_id')->comment('記事ID');
            $table->text('body')->comment('コメント本文');
            $table->systemstamps();

            $table->index('parent_comment_id');
            $table->index('article_id');

            $table->foreign('parent_comment_id')->references('id')->on('naive_tree_comments')->deferrable()->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->deferrable()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->deferrable()->onDelete('cascade');
        });

        DB::statement("COMMENT ON TABLE naive_tree_comments is 'ナイーブツリーコメント'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::dropIfExists('naive_tree_comments');
    }
}
