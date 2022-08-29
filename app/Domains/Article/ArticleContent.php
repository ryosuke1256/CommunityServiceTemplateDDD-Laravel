<?php
declare(strict_types=1);

namespace App\Domains\Article;

/**
 * Value Object
 */
class ArticleContent
{
    private string $text;

    public function __construct(string $text)
    {
        $textLength = (int) mb_strlen($text);

        //　ルール、制約
        if ($textLength === 0) {
            throw new \DomainException('文字を入力してください');
        }

        $this->text = $text;
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
