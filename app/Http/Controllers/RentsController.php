<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RentsController extends Controller
{
    public function index()
    {
        $title = "Rent List";
        $rents = Rent::all();
        $dalin = "jo mes";

        log::info($rents);

        return view('rents.index', compact('title', 'rents', 'dalin'));
    }

    public function store(Request $request)
    {
        $rent = Rent::create($request->all());
        return response()->json(compact('rent'));
    }

    public function show($id)
    {
        $rent = Rent::findOrFail($id);
        return response()->json(compact('rent'));
    }

    public function update(Request $request, $id)
    {
        $rent = Rent::findOrFail($id);
        $rent->update($request->all());
        return response()->json(compact('rent'));
    }

    public function destroy($id)
    {
        Rent::destroy($id);
        $message = 'Deleted';
        return response()->json(compact('message'));
    }
}