<?php
declare(strict_types=1);

namespace App\Domains\Article;

use App\Exceptions\NotInputException;

/**
 * Value Object
 */
class ArticleTitle
{
    private string $text;

    public function __construct(string $text)
    {
        if ((int) mb_strlen($text) > 0) {
            $this->text = $text;
        } else {
            throw new NotInputException('文字を入力してください');
        }
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
