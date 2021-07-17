<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $category = Category::with('news')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.categories.index', ['categoryList' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->title;
        $category->desc =  $request->desc;

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись с ID ='.$category->id.' была добавлена');
        }
        return redirect()->route('admin.categories.index')->with('success', 'Произошла ошибка и запись не была добавлена');

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
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {

        $category->fill($request->only('name', 'desc'));

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись с ID ='.$category->id.' была обновлена');
        }
        return redirect()->route('admin.categories.index')->with('success', 'Произошла ошибка и запись не была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Запись с ID ='.$category->id.' была удалена');
    }
}
