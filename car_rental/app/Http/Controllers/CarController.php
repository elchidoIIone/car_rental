<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarModel;

class CarController extends Controller
{
    public function index()
    {
        $cars = CarModel::with('brand_id')->get();
        return response()->json([
            "data" => $cars,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'model' => 'required|string',
            'year' => 'required|numeric',
            'daily_rate' => 'required|numeric'
        ]);

        $car = CarModel::create($request->all());

        return response()->json([
            "data" => $car,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $car = CarModel::with('brand')->find($id);
        if ($car == null) {
            return response()->json([
                "message" => "Vehículo no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $car,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $car = CarModel::find($id);
        if ($car == null) {
            return response()->json([
                "message" => "Vehículo no encontrado",
                "status" => "error"
            ], 404);
        }

        $car->update($request->all());

        return response()->json([
            "data" => $car,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $car = CarModel::find($id);
        if ($car == null) {
            return response()->json([
                "message" => "Vehículo no encontrado",
                "status" => "error"
            ], 404);
        }

        $car->delete();

        return response()->json([
            "message" => "Vehículo eliminado",
            "status" => "success"
        ], 204);
    }


   
}