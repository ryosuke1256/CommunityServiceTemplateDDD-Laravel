<?php
declare(strict_types=1);

namespace App\Domains\ArticleCategory;

use App\Exceptions\NotInputException;

class ArticleCategory
{
    private int $id;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $nameLength = (int) mb_strlen($name);

        //　ルール、制約
        if ($nameLength === 0) {
            throw new NotInputException('文字を入力してください');
        }

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
