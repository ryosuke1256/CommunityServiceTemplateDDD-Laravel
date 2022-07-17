<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

use Carbon\Carbon;

interface IArticleComment
{
    public function getId(): int;

    public function getTitle(): string;

    public function getContent(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;

    public function getDeletedAt(): Carbon;
}
