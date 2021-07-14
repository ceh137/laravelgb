<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categoryModel = new Category();
        return view('categories.index', ['categoryList' => $categoryModel->GetCategoriesAll()]);
    }

    public function news_from_category(int $cat_id) {
        $newsModel = new News();
        return view('news.index', ['newsList' => $newsModel->getNewsFromCat($cat_id)]);
    }
}
