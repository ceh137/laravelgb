<?php


namespace App\Http\Controllers\Admin;


use App\Contracts\ParserContract;
use App\Http\Requests\ParserInputRequest;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController
{
    public function index()
    {
        return view('admin.parser.input');
    }

    public function save(ParserInputRequest  $request, ParserContract $parserService)
    {

        $material = $parserService->getParsedMaterial($request->only('url'));

        if ($parserService->storeParsedMaterial($material)) {
            return redirect()->route('admin.news.index')->with('success', 'News has been parsed');
        } else {
            return redirect()->route('admin.news.index')->with('error', 'Error has occured');;
        }

    }

}
