<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdaterequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        if (auth('sanctum')->check() && auth('sanctum')->user()->role->name !== 'Admin' || ! auth('sanctum')->user()) {
            return abort(401);
        };
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return User::where('id', $user->id)->first();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdaterequest $request, User $user)
    {
        $data = User::where('id', $user->id)->first();

//        dd($data);

       $l =  $data->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
//            'password' => Hash::make($request->password),
        ]);

       if ($l){
           return response()->json([
               'success' => 'Muvaffaqiyatli', 'status' => 200,

           ]);
       }else{
           return response()->json([
               'success' => 'Something went wrong', 'status' => 403,

           ]);
       }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $data = User::where('id', $user->id)->first();
        $data->delete();
        return response()->json([
            'success' => 'Muvaffaqiyatli o\'chirildi', 'status' => 200
        ]);
    }
}
