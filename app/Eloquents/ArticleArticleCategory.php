<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Eloquents\ArticleCategory;
use App\Eloquents\Article;

class ArticleArticleCategory extends Model
{
    use HasFactory;

    public function articleCategory(): BelongsToMany
    {
        return $this->belongsToMany(ArticleCategory::class);
    }

    public function article(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
