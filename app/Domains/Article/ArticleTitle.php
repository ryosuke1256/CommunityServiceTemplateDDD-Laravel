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
        // ルール、制約
        if ((int) mb_strlen($text) === 0) {
            throw new NotInputException('文字を入力してください');
        }

        if ((int) mb_strlen($text) >= 256) {
            throw new \DomainException('255文字以下を入力してください');
        }

        $this->text = $text;
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
