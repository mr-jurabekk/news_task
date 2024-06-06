<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        return News::all();
    }


    public function store(NewsStoreRequest $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(NewsStoreRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

}
