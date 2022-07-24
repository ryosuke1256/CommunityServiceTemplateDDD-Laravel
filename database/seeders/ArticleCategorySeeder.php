<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleCategoryModel;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCategoryModel::insert([
            ['article_category_name' => 'カテゴリ１'],
            ['article_category_name' => 'カテゴリ２'],
        ]);
    }
}
