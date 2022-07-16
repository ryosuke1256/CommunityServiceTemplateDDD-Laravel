<?php
declare(strict_types=1);

namespace App\Domains\Article;

use App\Domains\Article\ArticleTitle;
use App\Domains\Article\ArticleContent;
use Carbon\Carbon;

interface IArticle
{
    public function getId(): int;

    public function getTitle(): string;

    public function getContent(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;

    public function getDeletedAt(): Carbon;
}
