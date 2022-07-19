<?php
declare(strict_types=1);

namespace App\Repositories\ArticleStatus;

use App\Domains\ArticleStatus\ArticleStatus;
use App\Repositories\ArticleStatus\IArticleStatueRepository;
use App\Models\ArticleStatusModel;

class ArticleStatusRepository implements IArticleStatueRepository
{
    /**
     * ドメインオブジェクトの構築
     */
    final public static function find(int $id): ArticleStatus
    {
        $articleStatus = ArticleStatusModel::find($id);

        return new ArticleStatus($articleStatus->id, $articleStatus->article_status_name);
    }

    final public static function edit(ArticleStatus $articleStatus): void
    {
        ArticleStatusModel::find($articleStatus->getId())->update(['name' => $articleStatus->getName()]);
    }
}
