<?php
declare(strict_types=1);

namespace App\Repositories\ArticleCategory;

use App\Domains\Article\Article;
use App\Domains\ArticleCategory\ArticleCategory;
use App\Repositories\ArticleCategory\IArticleCategoryRepository;
use Illuminate\Support\Facades\DB;

class ArticleCategoryRepository implements IArticleCategoryRepository
{
    // /**
    //  * ドメインオブジェクトの永続化
    //  */
    // final public static function storeCategory(Article $article): ArticleCategory
    // {
    //     $articleCategory = DB::table('article_article_categories')
    //         ->where('article_id', $article->id)
    //         ->get();

    //     // FIXME:$articleCategory->name
    //     return new ArticleCategory($articleCategory->id, $articleCategory->name);
    // }

    /**
     * ドメインオブジェクトの構築
     * 
     * @return array<Article>
     */
    final public static function findAll(Article $article): array
    {
        $articleCategories = DB::table('article_article_categories')
            ->where('article_id', $article->id)
            ->get();

        $categories = [];

        foreach ($articleCategories as $articleCategory) {
            $categories[] = new ArticleCategory($articleCategory->id, $articleCategory->name);
        }
        return $categories;
    }
}
 