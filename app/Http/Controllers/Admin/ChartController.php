<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> main
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $apartments = Apartment::all()->where('user_id', $id);

<<<<<<< HEAD
=======


>>>>>>> main
        return view('admin.chart', compact('apartments'));
    }
}
