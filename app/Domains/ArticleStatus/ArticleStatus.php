<?php
declare(strict_types=1);

namespace App\Domains\ArticleStatus;

class ArticleStatus
{
    private int $id;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    final public function getId(): int
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }
}
