<?php
declare(strict_types=1);

namespace App\Repositories\ArticleCategory;

use App\Domains\Article\Article;
use App\Domains\ArticleCategory\ArticleCategory;

interface IArticleCategoryRepository
{
    public static function findAll(Article $article): array;
}
