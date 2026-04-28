<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $propertyCount = Property::count();

        return view('dashboard', compact('propertyCount'));
    }
}