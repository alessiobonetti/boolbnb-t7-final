<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $apartments=Apartment::all();
        return view('admin.chart', compact('apartments'));
    }
}
