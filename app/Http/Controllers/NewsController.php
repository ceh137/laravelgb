<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $newsModel = new News();
        return view('news.index', ['newsList' => $newsModel->getNews()]);
    }

    public function article($art_id) {
        $newsModel = new News();
        return view('news.single', ['article' => $newsModel->getNewsByID($art_id)]);
    }
}
