<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsModel;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = PaymentsModel::with('rental_id')->get();
        return response()->json([
            "data" => $payments,
            "status" => "success"
        ]);
    }

    public function create() {}

    public function store(Request $request)
    {
        $request->validate([
            'rental_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string'
        ]);

        $payment = PaymentsModel::create($request->all());

        return response()->json([
            "data" => $payment,
            "status" => "success"
        ], 201);
    }

    public function show(string $id)
    {
        $payment = PaymentsModel::with('rental_id')->find($id);
        if ($payment == null) {
            return response()->json([
                "message" => "Pago no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $payment,
            "status" => "success"
        ]);
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id)
    {
        $payment = PaymentsModel::find($id);
        if ($payment == null) {
            return response()->json([
                "message" => "Pago no encontrado",
                "status" => "error"
            ], 404);
        }

        $payment->update($request->all());

        return response()->json([
            "data" => $payment,
            "status" => "success"
        ]);
    }

    public function destroy(string $id)
    {
        $payment = PaymentsModel::find($id);
        if ($payment == null) {
            return response()->json([
                "message" => "Pago no encontrado",
                "status" => "error"
            ], 404);
        }

        $payment->delete();

        return response()->json([
            "message" => "Pago eliminado",
            "status" => "success"
        ], 204);
    }
}