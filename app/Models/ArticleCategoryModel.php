<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ArticleModel;
use App\Models\ArticleArticleCategoryModel;

class ArticleCategoryModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['article_category_name'];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(ArticleModel::class)->using(ArticleArticleCategoryModel::class);
    }
}
