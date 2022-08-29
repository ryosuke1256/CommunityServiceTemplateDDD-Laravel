<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

use App\Domains\ArticleComment\ArticleCommentTitle;
use App\Domains\ArticleComment\ArticleCommentContent;
use Carbon\Carbon;

/**
 * Entity
 *
 * 集約ルート
 */
class ArticleComment
{
    private ?int $id;

    private int $userId;

    private int $articleId;

    /** タイトルは使用していない */
    private ArticleCommentTitle $articleCommentTitle;

    private ArticleCommentContent $articleCommentContent;

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
        int $articleId,
        ArticleCommentTitle $articleCommentTitle,
        ArticleCommentContent $articleCommentContent
    ): self {
        $articleComment = new self();
        $articleComment->id = null;
        $articleComment->userId = $userId;
        $articleComment->articleId = $articleId;
        $articleComment->articleCommentTitle = $articleCommentTitle;
        $articleComment->articleCommentContent = $articleCommentContent;
        $articleComment->createdAt = null;
        $articleComment->updatedAt = null;
        $articleComment->deletedAt = null;
        return $articleComment;
    }

    /**
     * 再構築
     */
    final public static function restoreFromSource(
        int $id,
        int $userId,
        int $articleId,
        ArticleCommentTitle $articleCommentTitle,
        ArticleCommentContent $articleCommentContent,
        Carbon $createdAt,
        Carbon $updatedAt,
        Carbon $deletedAt
    ): self {
        $articleComment = new self();
        $articleComment->id = $id;
        $articleComment->userId = $userId;
        $articleComment->articleId = $articleId;
        $articleComment->articleCommentTitle = $articleCommentTitle;
        $articleComment->articleCommentContent = $articleCommentContent;
        $articleComment->createdAt = $createdAt;
        $articleComment->updatedAt = $updatedAt;
        $articleComment->deletedAt = $deletedAt;
        return $articleComment;
    }

    final public function getId(): int
    {
        return $this->id;
    }

    final public function getUserId(): int
    {
        return $this->userId;
    }

    final public function getArticleId(): int
    {
        return $this->articleId;
    }

    final public function getTitle(): string
    {
        return $this->articleCommentTitle->getText();
    }

    final public function getContent(): string
    {
        return $this->articleCommentContent->getText();
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
