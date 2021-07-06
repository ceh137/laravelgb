<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.index', ['categoryList' => $this->getCategories()]);
    }

    public function news_from_category(int $cat_id) {

        return view('news.index', ['newsList' => $this->getNews($cat_id)]);
    }
}
