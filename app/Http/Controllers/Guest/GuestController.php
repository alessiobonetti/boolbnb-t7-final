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
        // Ricevo la titudine e longitudine
        $latitude = $request['query_lat'];
        $longitude = $request['query__long'];
        // Distanz Km TODO metterla come variabile
        $radius = 150;

        // Mega query tutta in eloquent. i risultati sono in ordine di distanza
        // https://en.wikipedia.org/wiki/Haversine_formula <- questa formula
        $apartments = Apartment::selectRaw("*,
                     ( 6371 * acos( cos( radians(?) ) *
                       cos( radians( lat ) )
                       * cos( radians( lng ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( lat ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
            ->where('published', '=', 1)
            ->having('distance', "<", $radius)
            ->orderBy('distance', 'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        return response()->json($apartments);

        // Query in Mysql
        // SELECT *, ((ACOS(SIN(46.04724300 * PI() / 180) *
        // SIN(lat * PI() / 180) + COS(lat * PI() / 180) *
        // COS(lat * PI() / 180) * COS((9.22013800 - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515)
        // as distance FROM apartments HAVING distance <= 5 ORDER BY distance ASC
    }
}
