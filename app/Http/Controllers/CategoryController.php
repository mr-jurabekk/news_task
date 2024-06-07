<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Nette\Utils\data;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }


    public function store(CategoryStoreRequest $request)
    {

//        dd($request);
        $data = [
           'name' => $request->name,
           'description' => $request->description,
           'image' => $request->image,
           'slug' => Str::slug($request->name, '-')

        ];

        Category::create($data);

        return response()->json('success', 200);
    }

    public function show(Category $slug)
    {
        $posts = Category::where('slug', $slug->slug)->first();
        return $posts;
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
