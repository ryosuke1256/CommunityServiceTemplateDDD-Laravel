<?php
declare(strict_types=1);

namespace App\Domains\Article;

/**
 * Value object
 */
class ArticleTag
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
        $articleTag = new self();
        $articleTag->id = null;
        $articleTag->name = $name;
        return $articleTag;
    }

    /**
     * 再構築
     */
    final public static function restoreFromSource(int $id, string $name): self
    {
        $articleTag = new self();
        $articleTag->id = $id;
        $articleTag->name = $name;
        return $articleTag;
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
