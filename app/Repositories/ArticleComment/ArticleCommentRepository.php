<?php
declare(strict_types=1);

namespace App\Repositories\ArticleComment;

use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleComment\ArticleComment;
use App\Domains\ArticleComment\ArticleCommentTitle;
use App\Domains\ArticleComment\ArticleCommentContent;
use App\Models\ArticleCommentModel;
use App\Repositories\ArticleComment\IArticleCommentRepository;

class ArticleCommentRepository implements IArticleCommentRepository
{
    /**
     * @return array<ArticleComment>
     */
    final public static function get(Article $article): array
    {
        $comments = ArticleCommentModel::where('article_id', $article->getId())->get();

        $articleComments = [];
        foreach ($comments as $comment) {
            $articleComments[] = new ArticleComment(
                $comment->id,
                new ArticleCommentTitle(),
                new ArticleCommentContent($comment->article_comment_content),
                $comment->created_at,
                $comment->updated_at,
                $comment->deleted_at
            );
        }
        return $articleComments;
    }

    final public static function save(User $user, Article $article, ArticleComment $articleComment): void
    {
        ArticleCommentModel::create([
            'user_id' => $user->getId(),
            'article_id' => $article->getId(),
            'title' => $articleComment->getTitle(),
            'content' => $articleComment->getContent(),
        ]);
    }

    final public static function edit(ArticleComment $articleComment): void
    {
        ArticleCommentModel::find($articleComment->getId())->update([
            'title' => $articleComment->getTitle(),
            'content' => $articleComment->getContent(),
        ]);
    }

    final public static function delete(ArticleComment $articleComment): void
    {
        ArticleCommentModel::find($articleComment->getId())->delete();
    }
}
