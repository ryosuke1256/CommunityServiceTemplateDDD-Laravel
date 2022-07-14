<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_article_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_category_id')->unique();
            $table->unsignedBigInteger('article_id')->unique();
            $table->timestamps();
            $table
                ->foreign('article_id')
                ->references('id')
                ->on('articles');
            $table
                ->foreign('article_category_id')
                ->references('id')
                ->on('article_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_article_category');
    }
}
