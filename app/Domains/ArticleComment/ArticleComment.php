<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

use App\Domains\ArticleComment\IArticleComment;
use App\Domains\ArticleComment\ArticleCommentTitle;
use App\Domains\ArticleComment\ArticleCommentContent;
use Carbon\Carbon;

/**
 * Entity
 *
 * 集約ルート
 */
class ArticleComment implements IArticleComment
{
    private int $id;

    private ArticleCommentTitle $articleCommentTitle;

    private ArticleCommentContent $articleCommentContent;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    private Carbon $deletedAt;

    public function __construct(
        int $id,
        ArticleCommentTitle $articleCommentTitle,
        ArticleCommentContent $articleCommentContent,
        Carbon $createdAt,
        Carbon $updatedAt,
        Carbon $deletedAt
    ) {
        $this->id = $id;
        $this->articleCommentTitle = $articleCommentTitle;
        $this->articleCommentContent = $articleCommentContent;
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
