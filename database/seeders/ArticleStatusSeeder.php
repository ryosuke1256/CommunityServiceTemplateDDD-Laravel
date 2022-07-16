<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Eloquents\ArticleStatus;

class ArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleStatus::insert([
            ['article_status_name' => '編集中'],
            ['article_status_name' => '公開'],
            ['article_status_name' => '非公開'],
        ]);
    }
}
