<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\UserModel;
use App\Models\ArticleStatusModel;
use App\Models\ArticleCommentModel;
use App\Models\ArticleCategoryModel;

class ArticleModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'article_status_id', 'title', 'content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }

    public function articleStatus(): BelongsTo
    {
        return $this->belongsTo(ArticleStatusModel::class);
    }

    public function articleComment(): HasMany
    {
        return $this->hasMany(ArticleCommentModel::class);
    }

    public function articleCategory(): BelongsToMany
    {
        return $this->belongsToMany(ArticleCategoryModel::class);
    }
}
