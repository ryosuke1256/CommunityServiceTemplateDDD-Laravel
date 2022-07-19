<?php
declare(strict_types=1);

namespace App\Repositories\Media;

use App\Domains\Media;
use App\Repositories\Media\IMediaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Collection;
use App\Domains\User\User;
use App\Domains\Article\Article;
use App\Domains\ArticleStatus\ArticleStatus;
use App\Domains\ArticleCategory\ArticleCategory;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\ArticleStatus\ArticleStatusRepository;
use App\Models\ArticleModel;
use App\Models\ArticleCategoryModel;
use App\Models\ArticleArticleCategoryModel;

class MediaRepository
{
    /**
     * ドメインオブジェクトの構築
     */
    final public function getMedia(): Media
    {
        try {
            $articles = DB::table('article')
                ->orderBy('articles.created_at', 'desc')
                ->get();
            $articleIds = [];
            // FIXME: Performance
            foreach ($articles as $article) {
                $articleIds[] = $article->id;
            }
            return new Media($articles, $articleIds);
        } catch (Throwable $e) {
            Log::error('【onGetMediaError】' . $e->getMessage());
            throw $e;
        }
    }

    final public function save(
        User $user,
        Article $article,
        ArticleStatus $articleStatus,
        ArticleCategory $articleCategory
    ): void {
        try {
            DB::beginTransaction();

            $articleCategoryId = ArticleCategoryModel::create([
                'article_category_name' => $articleCategory->getName(),
            ])->id;

            $articleId = ArticleModel::create([
                'user_id' => $user->getId(),
                'article_status_id' => $articleStatus->getId(),
                'title' => $article->getTitle(),
                'content' => $article->getContent(),
            ])->id;

            ArticleArticleCategoryModel::create([
                'article_category_id' => $articleCategoryId,
                'article_id' => $articleId,
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onSubmitError】' . $e->getMessage());
            throw $e;
        }
    }

    final public function getArticles(int $displayCount): Collection
    {
        try {
            $articles = DB::table('article')
                ->orderBy('articles.created_at', 'desc')
                ->limit($displayCount)
                ->get();
            return $articles;
        } catch (Throwable $e) {
            Log::error('【onShowError】' . $e->getMessage());
            throw $e;
        }
    }

    final public function edit(Article $article, ArticleStatus $articleStatus, ArticleCategory $articleCategory): void
    {
        try {
            DB::beginTransaction();

            ArticleRepository::edit($article);

            ArticleStatusRepository::edit($articleStatus);

            // TODO: ArticleCategory

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onEditError】' . $e->getMessage());
            throw $e;
        }
    }

    final public function delete(Article $article, ArticleStatus $articleStatus, ArticleCategory $articleCategory): void
    {
        try {
            DB::beginTransaction();

            ArticleRepository::delete($article);

            DB::table('article_statuses')
                ->where('article_id', $id)
                ->delete();

            DB::table('article_categories')
                ->where('id', $articleStatus->getId())
                ->update(['article_category_name' => $articleCategory->getName()]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('【onEditError】' . $e->getMessage());
            throw $e;
        }
    }
}
