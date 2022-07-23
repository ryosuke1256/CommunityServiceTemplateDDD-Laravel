<?php
declare(strict_types=1);

namespace App\Repositories\Article;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\Article\ArticleTitle;
use App\Domains\Article\ArticleContent;
use App\Domains\ArticleStatus\ArticleStatus;
use App\Domains\ArticleCategory\ArticleCategory;
use App\Models\ArticleModel;
use App\Models\ArticleCategoryModel;
use App\Models\ArticleStatusModel;
use App\Models\ArticleArticleCategoryModel;

class ArticleRepository implements IArticleRepository
{
    /**
     * @return array<Article>
     */
    final public static function getAll(): array
    {
        try {
            $articles = ArticleModel::orderBy('articles.created_at', 'desc')->get();
            $articleCategories = [];
            foreach ($articles as $article) {
                foreach ($article->articleCategories as $articleArticleCategory) {
                    $articleCategories[] = new ArticleCategory(
                        $articleArticleCategory->id,
                        $articleArticleCategory->article_category_name
                    );
                }
            }

            $articleArray = [];
            foreach ($articles as $article) {
                $articleArray[] = Article::restoreFromSource(
                    $article->id,
                    $article->user_id,
                    new ArticleStatus($article->articleStatus->id, $article->articleStatus->article_status_name),
                    $articleCategories,
                    new ArticleTitle($article->title),
                    new ArticleContent($article->content),
                    $article->created_at,
                    $article->updated_at,
                    $article->deleted_at
                );
            }
            return $articleArray;
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

    final public static function delete(int $articleId): void
    {
        try {
            DB::beginTransaction();

            $articles = ArticleModel::find($articleId);
            $articleCategories = $articles->articleCategories;

            $articles->delete();

            foreach ($articleCategories as $articleCategory) {
                $articleCategory->delete();
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onEditError】' . $e->getMessage());
            throw $e;
        }
    }
}