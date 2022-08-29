<?php
declare(strict_types=1);

namespace App\Domains\Article;

/**
 * ファーストクラスコレクション
 */
class ArticleTags
{
    private int $articleId;
    /**
     * array<ArticleTag>
     */
    private array $articleTags;

    public function __construct(int $articleId, array $articleTags)
    {
        $tagCount = count($articleTags);
        //　ルール、制約
        if ($tagCount > 5) {
            throw new \DomainException('タグは５個までです');
        }
        $this->articleId = $articleId;
        $this->articleTags = $articleTags;
    }

    final public function getArticleId(): int
    {
        return $this->articleId;
    }

    final public function getArticleTags(): array
    {
        return $this->articleTags;
    }
}
