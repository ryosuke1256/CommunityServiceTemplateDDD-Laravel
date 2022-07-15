<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Eloquents\ArticleCategory;
use App\Eloquents\Article;

class ArticleArticleCategory extends Model
{
    use HasFactory;

    public function articleCategory()
    {
        return $this->belongsToMany(ArticleCategory::class);
    }

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
