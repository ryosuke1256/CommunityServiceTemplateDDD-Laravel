<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleTag;

/**
 * 
 */
class ArticlTagTest extends TestCase
{
    private const ID = 1;

    public function testCreate()
    {
        $articleTag = ArticleTag::create('タグ１');
        $this->assertSame(null, $articleTag->getId());
        $this->assertSame('タグ１', $articleTag->getName());
    }

    public function testRestoreFromSource()
    {
        $articleTag = ArticleTag::restoreFromSource(self::ID, 'タグ１');
        $this->assertSame(self::ID, $articleTag->getId());
        $this->assertSame('タグ１', $articleTag->getName());
    }
}
