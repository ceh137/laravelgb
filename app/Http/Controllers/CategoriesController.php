<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $category = Category::with('news')->paginate(10);
        return view('categories.index', ['categoryList' => $category]);
    }

    public function news_from_category(Category $category) {

        $news = News::with('category')->where('category_id', '=' , $category->id)->paginate(10);
        return view('news.index', ['newsList' => $news]);
    }
}
