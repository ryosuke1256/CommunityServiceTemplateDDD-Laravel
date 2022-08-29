<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleContent;

class ArticleContentTest extends TestCase
{
    public function testEmptyString()
    {
        $this->expectException(\DomainException::class);
        new ArticleContent('');
    }
}
