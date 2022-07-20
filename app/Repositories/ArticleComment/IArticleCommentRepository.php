<?php
declare(strict_types=1);

namespace App\Repositories\ArticleComment;

use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleComment\ArticleComment;

interface IArticleCommentRepository
{
    public static function get(Article $article): array;
    public static function save(User $user, Article $article, ArticleComment $articleComment): void;
    public static function edit(ArticleComment $articleComment): void;
    public static function delete(ArticleComment $articleComment): void;
}