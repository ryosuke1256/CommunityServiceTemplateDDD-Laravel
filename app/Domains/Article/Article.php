<?php
declare(strict_types=1);

namespace App\Domains\Article;

use App\Domains\Article\IArticle;
use App\Domains\ArticleStatus\ArticleStatus;
use App\Domains\ArticleCategory\ArticleCategory;
use App\Domains\Article\ArticleTitle;
use App\Domains\Article\ArticleContent;
use Carbon\Carbon;

/**
 * Entity
 *
 * 集約ルート
 */
class Article implements IArticle
{
    private int $id;

    private ArticleStatus $articleStatus;

    /**
     * @var array<ArticleCategory>
     */
    private array $articleCategories;

    private ArticleTitle $articleTitle;

    private ArticleContent $articleContent;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    private Carbon $deletedAt;

    public function __construct(
        int $id,
        ArticleStatus $articleStatus,
        array $articleCategories,
        ArticleTitle $articleTitle,
        ArticleContent $articleContent,
        Carbon $createdAt,
        Carbon $updatedAt,
        Carbon $deletedAt
    ) {
        $this->id = $id;
        $this->articleStatus = $articleStatus;
        $this->articleCategories = $articleCategories;
        $this->articleTitle = $articleTitle;
        $this->articleContent = $articleContent;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    // ふるまい
    final public function editTitle(ArticleTitle $title): void
    {
        $this->articleTitle = $title;
    }

    // ふるまい
    final public function editContent(ArticleContent $content): void
    {
        $this->articleContent = $content;
    }

    final public function getId(): int
    {
        return $this->id;
    }

    final public function getArticleStatus(): ArticleStatus
    {
        return $this->articleStatus;
    }

    final public function getArticleCategories(): array
    {
        return $this->articleCategories;
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
