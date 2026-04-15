<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;

class BrandController extends Controller
{
    public function index()
    {
        $brands = BrandModel::all();
        return response()->json([
            "data" => $brands,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $brand = BrandModel::create($request->all());

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $brand = BrandModel::find($id);
        if ($brand == null) {
            return response()->json([
                "message" => "Marca no encontrada",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $brand = BrandModel::find($id);
        if ($brand == null) {
            return response()->json([
                "message" => "Marca no encontrada",
                "status" => "error"
            ], 404);
        }

        $brand->update($request->all());

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $brand = BrandModel::find($id);
        if ($brand == null) {
            return response()->json([
                "message" => "Marca no encontrada",
                "status" => "error"
            ], 404);
        }

        $brand->delete();

        return response()->json([
            "message" => "Marca eliminada correctamente",
            "status" => "success"
        ], 204);
    }
}