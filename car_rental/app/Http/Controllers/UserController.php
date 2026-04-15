<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('loyalty_level_id')->get();
        return response()->json([
            "data" => $users,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->loyalty_points = 0;
        $user->loyalty_level_id = 1;
        $user->save();

        return response()->json([
            "data" => $user,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                "message" => "Usuario no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $user,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                "message" => "Usuario no encontrado",
                "status" => "error"
            ], 404);
        }

        $user->update($request->except('password'));

        return response()->json([
            "data" => $user,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->json([
                "message" => "Usuario no encontrado",
                "status" => "error"
            ], 404);
        }

        $user->delete();

        return response()->json([
            "message" => "Usuario eliminado",
            "status" => "success"
        ], 204);
    }
}
