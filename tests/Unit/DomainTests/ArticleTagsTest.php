<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleTag;

class ArticlTagsTest extends TestCase
{
    private const ID = 1;

    // FIXME:Rename
    public function tesOverCount()
    {
        $articleTag = ArticleTag::create('タグ１');
        $this->assertSame(null, $articleTag->getId());
        $this->assertSame('タグ１', $articleTag->getName());
    }
}
