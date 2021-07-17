<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::with('category')->get();
        return view('news.index', ['newsList' => $news]);
    }

    public function article(News $news) {
        $news = News::all()->find($news->id);
        return view('news.single', ['article' => $news]);
    }
}
