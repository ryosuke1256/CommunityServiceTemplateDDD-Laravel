<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function articleStatus(): BelongsTo
    {
        return $this->belongsTo(ArticleStatus::class);
    }

    public function articleComment(): HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function articleCategory(): BelongsToMany
    {
        return $this->belongsToMany(ArticleCategory::class);
    }
}
