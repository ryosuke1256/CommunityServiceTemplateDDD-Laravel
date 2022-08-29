<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\ArticleComment\ArticleComment;
use App\Domains\ArticleComment\ArticleCommentTitle;
use App\Domains\ArticleComment\ArticleCommentContent;
use Carbon\Carbon;

class ArticleCommentTest extends TestCase
{
    private const ID = 1;

    private const USER_ID = 1;

    private const ARTICLE_ID = 1;

    public function testCreate()
    {
        $articleCommentTitle = ArticleCommentTitle::create();
        $articleCommentContent = new ArticleCommentContent('content');

        $articleComment = ArticleComment::create(
            self::USER_ID,
            self::ARTICLE_ID,
            $articleCommentTitle,
            $articleCommentContent
        );
        $this->assertSame('', $articleComment->getTitle());
        $this->assertSame('content', $articleComment->getContent());
    }

    public function testRestoreFromSource()
    {
        $createdAt = new Carbon('2017-01-01 12:30:30');
        $updatedAt = new Carbon('2017-01-01 12:30:30');
        $deletedAt = new Carbon('2017-01-01 12:30:30');

        $articleCommentTitle = ArticleCommentTitle::restoreFromSource('');
        $articleCommentContent = new ArticleCommentContent('content');

        $articleComment = ArticleComment::restoreFromSource(
            self::ID,
            self::USER_ID,
            self::ARTICLE_ID,
            $articleCommentTitle,
            $articleCommentContent,
            $createdAt,
            $updatedAt,
            $deletedAt
        );
        $this->assertSame(self::ID, $articleComment->getId());
        $this->assertSame(self::USER_ID, $articleComment->getUserId());
        $this->assertSame(self::ARTICLE_ID, $articleComment->getArticleId());
        $this->assertSame('', $articleComment->getTitle());
        $this->assertSame('content', $articleComment->getContent());
        $this->assertSame($createdAt, $articleComment->getCreatedAt());
        $this->assertSame($updatedAt, $articleComment->getUpdatedAt());
        $this->assertSame($deletedAt, $articleComment->getDeletedAt());
    }
}
