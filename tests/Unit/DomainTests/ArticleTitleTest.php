<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleTitle;

class ArticleTitleTest extends TestCase
{
    public function testEmptyString()
    {
        $this->expectException(\DomainException::class);
        new ArticleTitle('');
    }

    // FIXME:Rename
    public function testString()
    {
        $char255 =
            'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        new ArticleTitle($char255);
        $this->assertTrue(true);
    }

    public function testOver()
    {
        // FIXME：文字数を証明するか生成する関数（テスト済み）を作ってテストするかしないと
        $char256 =
            'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $this->expectException(\DomainException::class);
        new ArticleTitle($char256);
    }

    public function testGetText()
    {
        $text = 'Text';
        $articleTitle = new ArticleTitle($text);
        $this->assertSame($text, $articleTitle->getText());
    }
}
