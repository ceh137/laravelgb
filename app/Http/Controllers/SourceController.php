<?php

namespace App\Http\Controllers;

use App\Http\Requests\SourceStoreRequest;
use App\Http\Requests\SourceUpdateRequest;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.sources.index', ['sources' => Source::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SourceStoreRequest $request
     * @return void
     */
    public function store(SourceStoreRequest $request)
    {
        Source::create($request->validated());

        return redirect()->route('admin.source.index')->with('success', 'Source has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param Source $source
     * @return void
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SourceUpdateRequest $request
     * @param Source $source
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SourceUpdateRequest $request, Source $source)
    {
        $source->fill($request->validated());
        if ($source->save()) {
            return redirect()->route('admin.source.index')->with('success', 'Source with ID = '. $source->id .' has been updated');
        } else {
            return redirect()->route('admin.source.index')->with('error', 'Error has occured');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return Response
     */
    public function destroy(Source $source)
    {
        if (\request()->ajax()) {
            $source->delete();
            return with('success',  'Source with ID = '. $source->id.  ' has been deleted');
        }
    }
}
