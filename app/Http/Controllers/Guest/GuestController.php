<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Promotion;
use App\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        //arry Id premium
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
        return view('guest.welcome', compact('apartments_premium', 'apartments_free', 'services'));
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
    {   // Validazione

        // Ricevo I dati dalla search avanzata
        $latitude = $request['query_lat'];
        $longitude = $request['query__long'];
        $mq = $request['mq'];
        $services =  $request['services'];

        // Conto quanti sono i servizi ricevuti
        if (!empty($services)) {
            $service_length = count($services);
            // Estrapolo appartamenti con almeno uno di questi servizi
            // trasformo tutto in un array
            $apartments_id_services = DB::table('apartment_service')
                ->whereIn("service_id", $services)
                ->pluck('apartment_id')
                ->toArray();
            // Numero di servizi per ogni appartamento
            $apartments_n_services = array_count_values($apartments_id_services);
            // Eseguo un array in cui inserisco le chiavi che hanno tutti i servizi richiesti
            // i valori del nuovo array sono i miei appartamenti
            $apartments_id = array_keys($apartments_n_services, $service_length);
        } else {
            $apartments_id = Apartment::get('id');
        }



        // Distanz Km TODO metterla come variabile
        $radius = $request['radius'];



        // Mega query tutta in eloquent. i risultati sono in ordine di distanza
        // https://en.wikipedia.org/wiki/Haversine_formula <- questa formula
        $apartments = Apartment::selectRaw("*,
                     ( 6371 * acos( cos( radians(?) ) *
                       cos( radians( lat ) )
                       * cos( radians( lng ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( lat ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
            ->whereIn('id', $apartments_id)
            ->where('published', '=', 1)
            ->where('mq', '>=', $mq)
            ->having('distance', "<", $radius)
            ->orderBy('distance', 'asc')
            ->offset(0)
            ->limit(20)
            ->get();


        //return view('guest.search');
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
        return redirect()->route('guest.show', [$apartment])->with('success_message', 'Messaggio inviato correttamente');
    }
}
