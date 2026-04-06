<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('lease')->get();
        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lease_id'     => 'required|exists:leases,id',
            'amount'       => 'required|numeric',
            'payment_date' => 'required|date',
            'status'       => 'sometimes|string',
        ]);

        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    public function show(string $id)
    {
        $payment = Payment::with('lease')->find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        return response()->json($payment);
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        $request->validate([
            'lease_id'     => 'sometimes|exists:leases,id',
            'amount'       => 'sometimes|numeric',
            'payment_date' => 'sometimes|date',
            'status'       => 'sometimes|string',
        ]);
        $payment->update($request->all());
        return response()->json($payment);
    }

    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}