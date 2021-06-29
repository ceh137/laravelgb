<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories.category', ['categories' => $this->getCategories()]);
    }

    public function news_from_category(int $cat_id) {

        return view('news.news', ['news' => $this->getNews($cat_id)]);
    }
}
