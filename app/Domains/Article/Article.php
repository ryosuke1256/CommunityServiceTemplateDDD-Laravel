<?php
declare(strict_types=1);

namespace App\Domains\Article;

use App\Domains\Article\IArticle;
use App\Domains\Article\ArticleTitle;
use App\Domains\Article\ArticleContent;
use Carbon\Carbon;

/**
 * Entity
 */
class Article implements IArticle
{
    private int $id;

    private ArticleTitle $articleTitle;

    private ArticleContent $articleContent;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    private Carbon $deletedAt;

    public function __construct(
        int $id,
        ArticleTitle $articleTitle,
        ArticleContent $articleContent,
        Carbon $createdAt,
        Carbon $updatedAt,
        Carbon $deletedAt
    ) {
        $this->id = $id;
        $this->articleTitle = $articleTitle;
        $this->articleContent = $articleContent;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    final public function getId(): int
    {
        return $this->id;
    }

    final public function getTitle(): string
    {
        return $this->articleTitle->getText();
    }

    final public function getContent(): string
    {
        return $this->articleContent->getText();
    }

    final public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    final public function getDeletedAt(): Carbon
    {
        return $this->deletedAt;
    }
}
