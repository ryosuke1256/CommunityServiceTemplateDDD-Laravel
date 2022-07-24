<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleStatusModel;

class ArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleStatusModel::insert([
            ['article_status_name' => '編集中'],
            ['article_status_name' => '公開'],
            ['article_status_name' => '非公開'],
        ]);
    }
}
