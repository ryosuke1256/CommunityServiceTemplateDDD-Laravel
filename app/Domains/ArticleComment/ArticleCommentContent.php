<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

/**
 * Value Object
 */
class ArticleCommentContent
{
    private string $text;

    public function __construct(string $text)
    {
        $textLength = (int) mb_strlen($text);

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
