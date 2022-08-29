<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\Article;
use App\Domains\Article\ArticleStatus;
use App\Domains\Article\ArticleCategory;
use App\Domains\Article\ArticleTitle;
use App\Domains\Article\ArticleContent;
use Carbon\Carbon;

class ArticleTest extends TestCase
{
    private const ID = 1;

    private const USER_ID = 1;

    // TODO:Rename?
    public function testCreate()
    {
        $article = Article::create(
            self::ID,
            ArticleStatus::create('status'),
            [new ArticleCategory(null, 'category')],
            new ArticleTitle('title'),
            new ArticleContent('content')
        );
        $this->assertSame(null, $article->getId());
        $this->assertSame(self::USER_ID, $article->getUserId());
        $this->assertSame('status', $article->getArticleStatus()->getName());
        $this->assertSame('category', $article->getArticleCategories()[0]->getName());
        $this->assertSame('title', $article->getTitle());
        $this->assertSame('content', $article->getContent());
        $this->assertSame(null, $article->getCreatedAt());
        $this->assertSame(null, $article->getUpdatedAt());
        $this->assertSame(null, $article->getDeletedAt());
    }

    public function testRestoreFromSource()
    {
        $createdAt = new Carbon('2017-01-01 12:30:30');
        $updatedAt = new Carbon('2017-01-01 12:30:30');
        $deletedAt = new Carbon('2017-01-01 12:30:30');

        $article = Article::restoreFromSource(
            self::ID,
            self::USER_ID,
            ArticleStatus::create('status'),
            [new ArticleCategory(null, 'category')],
            new ArticleTitle('title'),
            new ArticleContent('content'),
            $createdAt,
            $updatedAt,
            $deletedAt
        );
        $this->assertSame(self::ID, $article->getId());
        $this->assertSame(self::USER_ID, $article->getUserId());
        $this->assertSame('status', $article->getArticleStatus()->getName());
        $this->assertSame('category', $article->getArticleCategories()[0]->getName());
        $this->assertSame('title', $article->getTitle());
        $this->assertSame('content', $article->getContent());
        $this->assertSame($createdAt, $article->getCreatedAt());
        $this->assertSame($updatedAt, $article->getUpdatedAt());
        $this->assertSame($deletedAt, $article->getDeletedAt());

        $editedTitle = 'editedTitle';
        $article->editTitle(new ArticleTitle($editedTitle));
        $this->assertSame($editedTitle, $article->getTitle());

        $editedContent = 'editedContent';
        $article->editContent(new ArticleContent($editedContent));
        $this->assertSame($editedContent, $article->getContent());
    }
}
