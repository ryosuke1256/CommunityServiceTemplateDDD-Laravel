<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ArticleModel;

class ArticleCommentModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['article_id', 'user_id', 'article_comment_title', 'article_comment_content'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(ArticleModel::class);
    }
}
