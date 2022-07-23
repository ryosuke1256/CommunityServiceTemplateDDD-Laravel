<?php
declare(strict_types=1);

namespace App\Domains\Article;

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
class Article
{
    private ?int $id;

    private int $userId;

    private ArticleStatus $articleStatus;

    /**
     * @var array<ArticleCategory>
     */
    private array $articleCategories;

    private ArticleTitle $articleTitle;

    private ArticleContent $articleContent;

    private ?Carbon $createdAt;

    private ?Carbon $updatedAt;

    private ?Carbon $deletedAt;

    private function __construct()
    {
    }

    /**
     * 生成
     */
    final public static function create(
        int $userId,
        ArticleStatus $articleStatus,
        array $articleCategories,
        ArticleTitle $articleTitle,
        ArticleContent $articleContent
    ): self {
        $article = new self();
        $article->id = null;
        $article->userId = $userId;
        $article->articleStatus = $articleStatus;
        $article->articleCategories = $articleCategories;
        $article->articleTitle = $articleTitle;
        $article->articleContent = $articleContent;
        $article->createdAt = null;
        $article->updatedAt = null;
        $article->deletedAt = null;
        return $article;
    }

    /**
     * 再構築
     */
    final public static function restoreFromSource(
        int $id,
        int $userId,
        ArticleStatus $articleStatus,
        array $articleCategories,
        ArticleTitle $articleTitle,
        ArticleContent $articleContent,
        Carbon $createdAt,
        Carbon $updatedAt,
        Carbon $deletedAt
    ): self {
        $article = new self();
        $article->id = $id;
        $article->userId = $userId;
        $article->articleStatus = $articleStatus;
        $article->articleCategories = $articleCategories;
        $article->articleTitle = $articleTitle;
        $article->articleContent = $articleContent;
        $article->createdAt = $createdAt;
        $article->updatedAt = $updatedAt;
        $article->deletedAt = $deletedAt;
        return $article;
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

    final public function getUserId(): int
    {
        return $this->userId;
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
