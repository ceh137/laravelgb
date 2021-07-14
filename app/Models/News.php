<?php declare(strict_types=1);


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function getNews(): object
    {
        return \DB::table($this->table)->select(['news_id', 'title', 'news.category_id as categoryId', 'categories.name as categoryName'])->leftJoin('categories', 'news.category_id', '=', 'categories.category_id')->get();
    }

    public function getNewsByID(int $id): object
    {
        return \DB::table($this->table)->select(['title', 'news_id', 'news.category_id as categoryId', 'categories.name as categoryName', 'article', 'news.created_at as newsCreatedAt'])->leftJoin('categories', 'news.category_id', '=', 'categories.category_id')->where('news_id', '=', $id)->first();
    }

    public function getNewsFromCat($cat_id)
    {
        return \DB::table($this->table)->select(['news_id', 'title', 'news.category_id as categoryId', 'categories.name as categoryName'])->leftJoin('categories', 'news.category_id', '=', 'categories.category_id')->where('news.category_id', '=', $cat_id)->get();
    }
}
