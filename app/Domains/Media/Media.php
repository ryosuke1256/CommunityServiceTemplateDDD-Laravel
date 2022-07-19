<?php
declare(strict_types=1);

namespace App\Domains;
use Illuminate\Support\Collection;

class Media
{
    private Collection $articles;

    private array $categories;

    public function __construct(Collection $articles, array $categories)
    {
        $this->articles = $articles;
        $this->categories = $categories;
    }

    final public function getArticles(): Collection
    {
        return $this->articles;
    }

    final public function getCategories(): array
    {
        return $this->categories;
    }
}
