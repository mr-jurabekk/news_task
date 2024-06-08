<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Nette\Utils\data;

class CategoryController extends Controller
{

    public function __construct()
    {
        if (auth('sanctum')->check() && auth('sanctum')->user()->role->name !== 'Admin' || ! auth('sanctum')->user()) {
            return abort(401);
        };
    }
    public function index()
    {
        return new Collection(CategoryResource::collection(Category::cursorPaginate(10)));

    }


    public function store(CategoryStoreRequest $request)
    {

        if ($request->hasFile('file_url')){
            $file = $request->file('file_url');
            $name = $file->hashName();

            $path = $request->file('file_url')->storeAs(
                'files', $name, 'public'
            );
        }

        $data = [
           'name' => $request->name,
           'description' => $request->description,
           'image' => $path ?? null,
           'slug' => Str::slug($request->name, '-')

        ];

        Category::create($data);

        return response()->json('success', 200);
    }

    public function show(Category $slug)
    {
        $posts = Category::where('slug', $slug->slug)->first();
        return new CategoryResource($posts);
    }

    public function update(CategoryStoreRequest $request, Category $slug)
    {
        if ($request->hasFile('file_url')){
            if (isset($slug->file_url)){
                Storage::delete($slug->file_url);
            }
            $name = $request->file('file_url')->hashName();
            $path = $request->file('file_url')->storeAs(
                'files', $name, 'public');
        }
        $data = Category::where('slug', $slug->slug)->first();

        $data->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path ?? $slug->file_url,
            'slug' => Str::slug($request->name, '-')

        ]);


        return response()->json('success', 200);
    }

    public function destroy(Category $slug)
    {
        if (auth('sanctum')->check() && auth('sanctum')->user()->role->name !== 'Admin' || ! auth('sanctum')->user()) {
            return abort(401);
        };

        $data = Category::where('slug', $slug->slug)->first();
        if ($data) {
            $data->delete();
            return response()->json([
                'success' => 'Muvaffaqiyatli', 'status' => 200
            ]);
        } else {
            return response()->json([
                'success' => 'Something went wrong', 'status' => 417
            ]);
        }
    }




}
