<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use App\Domains\User\User;
use App\Domains\Article\Article;

interface IArticleRepository
{
    public static function getAll(): array;
    public static function save(User $user, Article $article): void;
    public static function edit(User $user, Article $article): void;
    public static function delete(int $articleId): void;
}