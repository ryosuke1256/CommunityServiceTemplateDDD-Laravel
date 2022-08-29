<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleStatus;

class ArticleStatusTest extends TestCase
{
    private const ID = 1;

    public function testCreate()
    {
        $articleStatus = ArticleStatus::create('ステータス');
        $this->assertSame(null, $articleStatus->getId());
        $this->assertSame('ステータス', $articleStatus->getName());
    }

    public function testRestoreFromSource()
    {
        $articleStatus = ArticleStatus::restoreFromSource(self::ID, 'ステータス');
        $this->assertSame(self::ID, $articleStatus->getId());
        $this->assertSame('ステータス', $articleStatus->getName());
    }
}
