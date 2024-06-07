<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsStoreRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{


    public function index()
    {
        return News::all();
    }


    public function store(NewsStoreRequest $request)
    {
        $data = [
        'user_id' => auth('sanctum')->user()->id,
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->image,
        'slug' => Str::slug($request->name, '-')

        ];


        News::create($data);

        return response()->json([
            'success' => 'Muvaffaqiyatli', 'status' => 200
        ]);
    }

    public function show(News $slug)
    {
        $data = News::where('slug', $slug->slug)->first();

        return $data;
    }

    public function update(NewsStoreRequest $request, News $slug)
    {


        $data = News::where('slug', $slug->slug)->first();

        $data->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'slug' => Str::slug($request->name, '-')
        ]);


        return response()->json([
            'success' => 'Muvaffaqiyatli', 'status' => 200
        ]);
    }

    public function destroy(News $slug)
    {

        $news = News::where('slug', $slug->slug)->first();
        if ($news) {
            $news->delete();
            return response()->json([
                'success' => 'Muvaffaqiyatli', 'status' => 200
            ]);
        } else {
            return response()->json([
                'success' => 'Something went wrong', 'status' => 400
            ]);
        }
    }


}
