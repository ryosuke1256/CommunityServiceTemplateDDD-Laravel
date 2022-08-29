<?php
declare(strict_types=1);

namespace App\Domains\ArticleComment;

/**
 * Value Object
 */
class ArticleCommentTitle
{
    private string $text;

    private function __construct()
    {
    }

    /**
     * 生成
     */
    final public static function create(): self
    {
        $articleCommentTitle = new self();
        // 使用していないがNULL制約があるため空文字を入れる
        $articleCommentTitle->text = '';
        return $articleCommentTitle;
    }

    /**
     * 再構築
     */
    final public static function restoreFromSource(string $commentTitle): self
    {
        if ($commentTitle !== '') {
            throw new \DomainException('コメントのタイトルは空文字が正常値です');
        }

        $articleCommentTitle = new self();
        $articleCommentTitle->text = $commentTitle;

        return $articleCommentTitle;
    }

    final public function getText(): string
    {
        return $this->text;
    }
}
