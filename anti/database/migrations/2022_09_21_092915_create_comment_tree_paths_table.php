<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTreePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_tree_paths', function (Blueprint $table) {
            $table->unsignedInteger('ancestor')->comment('先祖コメントID');
            $table->unsignedInteger('descendant')->comment('子孫コメントID');
            $table->integer('path_length')->comment('階層');

            $table->systemstamps();

            $table->primary(['ancestor', 'descendant']);
            $table->foreign('ancestor')->references('id')->on('comments');
            $table->foreign('descendant')->references('id')->on('comments');
        });

        DB::statement("COMMENT ON TABLE comment_tree_paths is 'コメント閉包'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_tree_paths');
    }
}
