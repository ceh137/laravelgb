<?php

namespace App\Http\Controllers;

use App\Jobs\NewsJob;
use App\Models\Source;
use Illuminate\Http\Request;

class ParseNewsController extends Controller
{
    public function index() {
        $sources = Source::get('url');
        //dd($sources);
        foreach ($sources as $source){
            dump(gettype($source->url));
            $this->dispatch(new NewsJob($source->url));
        }
        return "Данные успешно скачаны";
    }
}
