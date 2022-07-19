<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleStatus\ArticleStatus;
use App\Models\ArticleModel;
use App\Repositories\Article\IArticleRepository;

class ArticleRepository implements IArticleRepository
{
    /**
     * ドメインオブジェクトの構築
     */
    final public static function find(int $id): Article
    {
        $article = ArticleModel::find($id);

        return new Article(
            $article->id,
            $article->title,
            $article->content,
            $article->created_at,
            $article->updated_at,
            $article->deleted_at
        );
    }

    /**
     * ドメインオブジェクトの永続化
     */
    final public static function save(User $user, Article $article, ArticleStatus $articleStatus): void
    {
        ArticleModel::create([
            'user_id' => $user->getId(),
            'article_status_id' => $articleStatus->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
        ]);
    }

    final public static function edit(Article $article): void
    {
        ArticleModel::find($article->getId())->update([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
        ]);
    }

    /**
     * ドメインオブジェクトの破棄
     */
    final public static function delete(Article $article): void
    {
        ArticleModel::find($article->getId())->delete();
    }
}
