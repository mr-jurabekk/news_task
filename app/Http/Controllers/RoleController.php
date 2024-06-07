<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        return  Role::all();

    }


    public function store(RoleStoreRequest $request)
    {
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
