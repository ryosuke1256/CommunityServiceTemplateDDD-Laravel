<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\UserModel;
use App\Models\ArticleStatusModel;
use App\Models\ArticleCommentModel;
use App\Models\ArticleCategoryModel;
use App\Models\ArticleArticleCategoryModel;
use App\Models\ArticleTagModel;

class ArticleModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    protected $dates = ['deleted_at'];
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

    public function articleComments(): HasMany
    {
        return $this->hasMany(ArticleCommentModel::class);
    }

    public function articleTags(): HasMany
    {
        return $this->hasMany(ArticleTagModel::class);
    }

    public function articleCategories(): BelongsToMany
    {
        return $this->belongsToMany(ArticleCategoryModel::class)->using(ArticleArticleCategoryModel::class);
    }
}
