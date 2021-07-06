<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return view('news.index', ['newsList' => $this->getAllNews()]);
    }

    public function article($art_id) {
        return view('news.single', ['article' => $this->getSingleArticle($art_id)]);
    }
}
