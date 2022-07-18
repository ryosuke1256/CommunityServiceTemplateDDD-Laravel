<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ArticleCategoryModel;
use App\Models\ArticleModel;

class ArticleArticleCategoryModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_article_categories';

    protected $fillable = ['article_category_id', 'article_id'];

    public function articleCategory(): BelongsToMany
    {
        return $this->belongsToMany(ArticleCategoryModel::class);
    }

    public function article(): BelongsToMany
    {
        return $this->belongsToMany(ArticleModel::class);
    }
}
