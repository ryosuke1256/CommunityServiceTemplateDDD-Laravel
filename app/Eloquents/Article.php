<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Eloquents\User;
use App\Eloquents\ArticleStatus;
use App\Eloquents\ArticleComment;
use App\Eloquents\ArticleCategory;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articleStatus()
    {
        return $this->belongsTo(ArticleStatus::class);
    }

    public function articleComment()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function articleCategory()
    {
        return $this->belongsToMany(ArticleCategory::class);
    }
}
