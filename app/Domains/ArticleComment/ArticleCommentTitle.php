<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

/**
 * Value Object
 */
class ArticleCommentTitle
{
    private string $text;

    public function __construct()
    {
        // CommentのTitleは使用していないがNULL制約があるため空文字を入れる
        $this->text = '';
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
