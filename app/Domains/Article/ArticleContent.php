<?php
declare(strict_types=1);

namespace App\Domains\Article;

use App\Exceptions\NotInputException;
use App\Exceptions\InvalidTextLengthException;

/**
 * Value Object
 */
class ArticleContent
{
    private string $text;

    public function __construct(string $text)
    {
        $textLength = (int) mb_strlen($text);

        if ($textLength === 0) {
            throw new NotInputException('文字を入力してください');
        }

        if ($textLength < 10) {
            throw new InvalidTextLengthException('10文字以上の入力が必要です');
        }

        $this->text = $text;
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
