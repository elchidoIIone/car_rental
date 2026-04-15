<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loyalty_levelModel;

class LoyaltyLevelController extends Controller
{
    public function index()
    {
        $levels = Loyalty_levelModel::all();
        return response()->json([
            "data" => $levels,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'min_points' => 'required|numeric',
            'discount_percentage' => 'required|numeric'
        ]);

        $level = Loyalty_levelModel::create($request->all());

        return response()->json([
            "data" => $level,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $level = Loyalty_levelModel::find($id);
        if ($level == null) {
            return response()->json([
                "message" => "Nivel de lealtad no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $level,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $level = Loyalty_levelModel::find($id);
        if ($level == null) {
            return response()->json([
                "message" => "Nivel no encontrado",
                "status" => "error"
            ], 404);
        }

        $level->update($request->all());

        return response()->json([
            "data" => $level,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $level = Loyalty_levelModel::find($id);
        if ($level == null) {
            return response()->json([
                "message" => "Nivel no encontrado",
                "status" => "error"
            ], 404);
        }

        $level->delete();

        return response()->json([
            "message" => "Nivel eliminado",
            "status" => "success"
        ], 204);
    }
}