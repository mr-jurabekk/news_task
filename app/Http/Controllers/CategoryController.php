<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }


    public function store(CategoryStoreRequest $request)
    {
        Category::create([
           'name' => $request->name,
           'description' => $request->description,
           'image' => $request->image,
            
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(CategoryStoreRequest $request, string $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }




}
