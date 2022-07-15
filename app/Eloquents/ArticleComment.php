<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Eloquents\Article;

class ArticleComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['article_comment_title', 'article_comment_content'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
