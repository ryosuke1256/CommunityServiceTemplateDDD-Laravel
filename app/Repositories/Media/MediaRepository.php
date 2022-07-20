<?php
declare(strict_types=1);

namespace App\Repositories\Media;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Domains\Media;
use App\Repositories\Media\IMediaRepository;
use App\Models\ArticleModel;

class MediaRepository implements IMediaRepository
{
    /**
     * ドメインオブジェクトの構築
     */
    final public function getMedia(): Media
    {
        try {
            $articles = ArticleModel::orderBy('articles.created_at', 'desc')->get();
            $articleIds = [];
            foreach ($articles as $article) {
                $articleIds[] = $article->id;
            }
            return new Media($articles, $articleIds);
        } catch (Throwable $e) {
            Log::error('【onGetMediaError】' . $e->getMessage());
            throw $e;
        }
    }
}