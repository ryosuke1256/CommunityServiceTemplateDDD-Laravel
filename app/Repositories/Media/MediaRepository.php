<?php
declare(strict_types=1);

namespace App\Repositories\Media;

use App\Domains\Media;
use App\Repositories\Media\IMediaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class MediaRepository implements IMediaRepository
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
}
