<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::with('category')->orderBy('updated_at', 'desc')->paginate(20);
        return view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.news.create", [
                'categories' => Category::select('id', 'name')->get(),
                'statuses' => NewsStatus::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsStoreRequest $request
     * @return RedirectResponse
     */
    public function store(NewsStoreRequest $request)
    {
        $news = new News();
        $news->fill($request->validated());

        if ($news->save())
        {
            return redirect()->route('admin.news.index')->with('success', 'Запись с ID = '.$news->id.' была успешно добавлена');
        }
        return redirect()->route('admin.news.index')->with('error', 'Ошибка, запись не была добавлена');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all(),
            'statuses' => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsUpdateRequest $request, News $news)
    {

        $news->fill($request->validated());

        if ($news->save())
        {
            return redirect()->route('admin.news.index')->with('success', 'Запись с ID = '.$news->id.' была успешно обновлена');
        }
        return redirect()->route('admin.news.index')->with('error', 'Ошибка, запись не была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @param Request $request
     * @return Response
     */
    public function destroy(News $news, Request $request)
    {
        if ($request->ajax()){
            $news->delete();
            return redirect()->route('admin.news.index')->with('success', 'Запись с ID = '.$news->id.' была удалена');
        }



    }
}
