<?php
declare(strict_types=1);

namespace App\Domains\Media;

class Media
{
    private array $articles;

    private array $categories;

    public function __construct(array $articles, array $categories)
    {
        $this->articles = $articles;
        $this->categories = $categories;
    }

    final public function getArticles(): array
    {
        return $this->articles;
    }

    final public function getCategories(): array
    {
        return $this->categories;
    }
}
