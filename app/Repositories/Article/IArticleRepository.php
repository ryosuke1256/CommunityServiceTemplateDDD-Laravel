<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleStatus\ArticleStatus;
use App\Domains\ArticleCategory\ArticleCategory;

interface IArticleRepository
{
    public static function getAll(): array;
    // public static function getArticles(int $displayCount): array;
    public static function save(User $user, Article $article): void;
    public static function edit(User $user, Article $article): void;
    public static function delete(int $articleId): void;
}