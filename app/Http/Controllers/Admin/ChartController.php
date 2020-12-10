<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Charts\SampleChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $apartments=Apartment::all();

        $chart = new SampleChart;

        $message = DB::table('apartments')->where('active', 1)->whereYear('created_at')->sum('message');
        $view = DB::table('apartments')->where('active', 1)->whereYear('created_at')->sum('view');

        return view('admin.chart', compact('apartments'));
    }
}
