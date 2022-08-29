<?php

namespace Tests\Unit\DomainTests;

use PHPUnit\Framework\TestCase;
use App\Domains\Article\ArticleCategory;

class ArticleCategoryTest extends TestCase
{
    public function testEmptyName()
    {
        $this->expectException(\DomainException::class);
        new ArticleCategory(1, '');
    }
    public function testAllMethod()
    {
        $categoryId = 1;
        $categoryName = 'name';
        $articleCategory = new ArticleCategory($categoryId, $categoryName);
        $this->assertSame($categoryId, $articleCategory->getId());
        $this->assertSame($categoryName, $articleCategory->getName());
    }
}
