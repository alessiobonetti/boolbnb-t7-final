<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $apartments = Apartment::all()->where('user_id', $id);

        return view('admin.chart', compact('apartments'));
    }
}
