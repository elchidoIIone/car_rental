<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverModel;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = DriverModel::with('user_id')->get();
        return response()->json([
            "data" => $drivers,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'license_number' => 'required|string'
        ]);

        $driver = DriverModel::create($request->all());

        return response()->json([
            "data" => $driver,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $driver = DriverModel::with('user_id')->find($id);
        if ($driver == null) {
            return response()->json([
                "message" => "Conductor no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $driver,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $driver = DriverModel::find($id);
        if ($driver == null) {
            return response()->json([
                "message" => "Conductor no encontrado",
                "status" => "error"
            ], 404);
        }

        $driver->update($request->all());

        return response()->json([
            "data" => $driver,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $driver = DriverModel::find($id);
        if ($driver == null) {
            return response()->json([
                "message" => "Conductor no encontrado",
                "status" => "error"
            ], 404);
        }

        $driver->delete();

        return response()->json([
            "message" => "Conductor eliminado",
            "status" => "success"
        ], 204);
    }
}
