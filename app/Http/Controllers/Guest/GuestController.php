<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Promotion;
use App\Service;
use Illuminate\Support\Carbon;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //arry Id premium
        $apartments_premium_id = [];

        $now = Carbon::now();
        // Query per avere tutti gli appartamenti con la promozione attiva
        $apartments_premium = Promotion::has('apartment')
            ->where("date_end", ">=", "$now")
            ->get();
        // Trovo e metto in un array gli id degli appartamenti premium
        foreach ($apartments_premium as $apartment) {
            $apartments_premium_id[] = $apartment->apartment->id;
        }
        // Trovo gli appartamenti free per differenza
        $apartments_free = Apartment::whereNotIn("id", $apartments_premium_id)
            ->where('published', '=', true)
            ->get();
        $apartments_premium = Apartment::whereIn("id", $apartments_premium_id)
            ->where('published', '=', true)
            ->get();


        $services = Service::all();
        return view('guest.welcome', compact('apartments_premium', 'apartments_free'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Gestire null e visualizzare slug
        $apartment = Apartment::find($id);
        return view('guest.show', compact('apartment'));
    }

    // // Funzione di ricerca appartamenti
    public function ajaxRequest()
    {
        return view('guest.search');
    }

    public function ajaxResponse(Request $request)
    {
        $topLeftPoint_lat = $request['query_topLeftPoint_lat'];
        $topLeftPoint_lon = $request['query_topLeftPoint_lon'];
        $btmRightPoint_lat = $request['query_btmRightPoint_lat'];
        $btmRightPoint_lon = $request['query_btmRightPoint_lon'];
        $data = Apartment::where('published', '=', true)
            ->whereBetween('lat', [$btmRightPoint_lat, $topLeftPoint_lat])
            ->whereBetween('long', [$topLeftPoint_lon, $btmRightPoint_lon])
            ->get();
        return response()->json($data);
    }
}
