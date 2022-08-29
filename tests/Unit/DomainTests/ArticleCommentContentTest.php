<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\ArticleComment\ArticleCommentContent;

class ArticleCommentContentTest extends TestCase
{
    public function testEmptyString()
    {
        $this->expectException(\DomainException::class);
        new ArticleCommentContent('');
    }
}
