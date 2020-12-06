<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
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
            ->select('apartment_id')
            ->get()
            ->toArray();


        // Trovo e metto in un array gli id degli appartamenti premium
        // foreach ($apartments_premium as $apartment) {
        //     $apartments_premium_id[] = $apartment->apartment->id;
        // }

        // Trovo gli appartamenti free per differenza
        $apartments_free = Apartment::whereNotIn("id", $apartments_premium)
            ->where('published', '=', true)
            ->get();
        $apartments_premium = Apartment::whereIn("id", $apartments_premium)
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
    public function ajaxRequest(Request $request)
    {
        $services = Service::all();
        if (!empty($request->address)) {
            $search = $request->address;
        } else {
            $search = '';
        }

        return view('guest.search', compact('search', 'services'));
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

    // $apartment contiene l'ID dell'appartamento
    public function writeMex(Request $request, $apartment)
    {

        $data = $request->all();

        $request->validate([
            'email' => 'required|email',
            'body' => 'required|string'
        ]);

        $newMex = new Message;
        $newMex->apartment_id = $apartment;
        $newMex->body = $data['body'];
        $newMex->email = $data['email'];

        $newMex->save();
        return redirect()->route('guest.show', [$apartment])->with('message', 'Success');
    }
}
