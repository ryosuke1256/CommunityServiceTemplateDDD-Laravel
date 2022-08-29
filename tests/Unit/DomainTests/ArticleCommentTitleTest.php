<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\ArticleComment\ArticleCommentTitle;

class ArticleCommentTitleTest extends TestCase
{
    public function testEmptyString()
    {
        $this->expectException(\DomainException::class);

        ArticleCommentTitle::restoreFromSource('title');
    }
}
