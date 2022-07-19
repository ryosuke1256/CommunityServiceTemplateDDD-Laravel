<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleStatus\ArticleStatus;

interface IArticleRepository
{
    public static function find(int $id): Article;

    public static function save(User $user, Article $article, ArticleStatus $articleStatus): void;

    public static function edit(Article $article): void;
}
