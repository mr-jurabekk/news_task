<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{


    public function index()
    {

        // Get the authenticated user
//        dd(auth('sanctum')->user()->role->name);

        if (! Gate::allows('admin', auth('sanctum')->user())) {
            abort(401); // Unauthorized
        }

//        if (! Gate::allows('update-post', $post)) {
//            abort(403);
//        }

//        if (auth('sanctum')->check() && auth('sanctum')->user()->role->name == 'User') {
//            abort(401);
//        }
        return  Role::all();

    }


    public function store(RoleStoreRequest $request)
    {
        if (auth('sanctum')->check() && auth('sanctum')->user()->role->name == 'User') {
            abort(401);
        }
        Role::create([
           'name' => $request->name
        ]);

        return response()->json('success', 200);
    }

    public function show(Role $role)
    {
       return Role::where('id', $role->id)->first();
    }


    public function update(Request $request, Role $role)
    {
       $data =  Role::where('id', $role->id)->first();

       $data->update([
           'name' => $request->name
       ]);

        return response()->json('success', 200);
    }


    public function destroy(Role $role)
    {
        $data =  Role::where('id', $role->id)->first();
        if ($data) {
            $data->delete();
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
