<?php
declare(strict_types=1);

namespace App\Domains\Article;

class ArticleStatus
{
    private ?int $id;

    private string $name;

    private function __construct()
    {
    }

    /**
     * 生成
     */
    final public static function create(string $name): self
    {
        $articleStatus = new self();
        $articleStatus->id = null;
        $articleStatus->name = $name;
        return $articleStatus;
    }

    /**
     * 再構築
     */
    final public static function restoreFromSource(int $id, string $name): self
    {
        $articleStatus = new self();
        $articleStatus->id = $id;
        $articleStatus->name = $name;
        return $articleStatus;
    }

    final public function getId(): ?int
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }
}
