<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RentalModel;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = RentalModel::all();
        return response()->json([
            "data" => $rentals,
            "status" => "success"
        ]);
    }

    public function create() {

    }

    public function store(Request $request)
    {
        $rental = RentalModel::create($request->all());

        return response()->json([
            "data" => $rental,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $rental = RentalModel::find($id);
        if ($rental == null) {
            return response()->json([
                "message" => "Renta no encontrada",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $rental,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $rental = RentalModel::find($id);
        if ($rental == null) {
            return response()->json([
                "message" => "Renta no encontrada",
                "status" => "error"
            ], 404);
        }

        $rental->update($request->all());

        return response()->json([
            "data" => $rental,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $rental = RentalModel::find($id);
        if ($rental == null) {
            return response()->json([
                "message" => "Renta no encontrada",
                "status" => "error"
            ], 404);
        }

        $rental->delete();

        return response()->json([
            "message" => "Renta eliminada",
            "status" => "success"
        ], 204);
    }

    
}