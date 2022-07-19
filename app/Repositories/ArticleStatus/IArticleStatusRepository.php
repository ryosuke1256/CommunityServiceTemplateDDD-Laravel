<?php
declare(strict_types=1);

namespace App\Repositories\ArticleStatus;

use App\Domains\ArticleStatus\ArticleStatus;

interface IArticleStatueRepository
{
    public static function find(int $id): ArticleStatus;

    public static function edit(ArticleStatus $articleStatus): void;
}
