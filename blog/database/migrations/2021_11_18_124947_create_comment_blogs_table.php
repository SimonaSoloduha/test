<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('comment_id');
            $table->timestamps();

            // IDX
            $table->index('blog_id', 'comment_blog_blog_idx');
            $table->index('comment_id', 'comment_blog_comment_idx');

            // FK
            $table->foreign('blog_id', 'comment_blog_blog_idx')->on('blog')->references('id');
            $table->foreign('comment_id', 'comment_blog_comment_idx')->on('comment')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_blogs');
    }
}
