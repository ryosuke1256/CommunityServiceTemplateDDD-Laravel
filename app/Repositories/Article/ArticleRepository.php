<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Models\ArticleModel;
use App\Models\ArticleCategoryModel;
use App\Models\ArticleStatusModel;
use App\Models\ArticleArticleCategoryModel;

class ArticleRepository
{
    /**
     * @return array<Article>
     */
    final public static function getAll(): array
    {
        try {
            $articleArray = [];
            $articles = ArticleModel::orderBy('articles.created_at', 'desc')->get();

            foreach ($articles as $article) {
                $articleArray[] = new Article(
                    $article->id,
                    $article->articleStatus(),
                    $article->articleCategory(), //FIXME
                    $article->title,
                    $article->content,
                    $article->created_at,
                    $article->updated_at,
                    $article->deleted_at
                );
            }
            return $articles;
        } catch (Throwable $e) {
            Log::error('【Error】' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * @param int $displayCount
     *
     * @return array<Article>
     */
    final public static function getPartialArticles(int $displayCount): array
    {
        try {
            $articleArray = [];
            $articles = ArticleModel::orderBy('articles.created_at', 'desc')
                ->limit($displayCount)
                ->get();

            foreach ($articles as $article) {
                $articleArray[] = new Article(
                    $article->id,
                    $article->articleStatus(),
                    $article->articleCategory(), //FIXME
                    $article->title,
                    $article->content,
                    $article->created_at,
                    $article->updated_at,
                    $article->deleted_at
                );
            }
            return $articles;
        } catch (Throwable $e) {
            Log::error('【Error】' . $e->getMessage());
            throw $e;
        }
    }

    final public static function save(User $user, Article $article): void
    {
        try {
            DB::beginTransaction();

            $articleCategoryIds = [];
            $articleCategories = $article->getArticleCategories();

            foreach ($articleCategories as $articleCategory) {
                $articleCategoryIds[] = ArticleCategoryModel::create([
                    'article_category_name' => $articleCategory->getName(),
                ])->id;
            }

            $articleId = ArticleModel::create([
                'user_id' => $user->getId(),
                'article_status_id' => $article->getArticleStatus()->getId(),
                'title' => $article->getTitle(),
                'content' => $article->getContent(),
            ])->id;

            foreach ($articleCategoryIds as $articleCategoryId) {
                ArticleArticleCategoryModel::create([
                    'article_category_id' => $articleCategoryId,
                    'article_id' => $articleId,
                ]);
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onSubmitError】' . $e->getMessage());
            throw $e;
        }
    }

    final public static function edit(User $user, Article $article): void
    {
        try {
            DB::beginTransaction();

            ArticleModel::find($article->getId())->update([
                'user_id' => $user->getId(),
                'article_status_id' => $article->getArticleStatus()->getId(),
                'title' => $article->getTitle(),
                'content' => $article->getContent(),
            ]);

            // TODO：カテゴリの編集

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onEditError】' . $e->getMessage());
            throw $e;
        }
    }

    final public static function delete(Article $article): void
    {
        try {
            DB::beginTransaction();

            // TODO: 一発で書ける書き方
            $articleArticleCategories = ArticleArticleCategoryModel::where('article_id', $article->getId())
                ->with('article_categories')
                ->get();
            ArticleArticleCategoryModel::where('article_id', $article->getId())->delete();

            foreach ($articleArticleCategories as $articleArticleCategory) {
                $articleArticleCategory->articleCategory()->delete();
            }

            ArticleModel::find($article->getId())->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onEditError】' . $e->getMessage());
            throw $e;
        }
    }
}
