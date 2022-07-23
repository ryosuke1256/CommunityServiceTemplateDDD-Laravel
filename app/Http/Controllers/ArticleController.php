<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applications\Services\IArticleService;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct(IArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function save(ArticleRequest $request)
    {
        // $articleService = resolve(IArticleService::class);
        dd($request);
    }
}
