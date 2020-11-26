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
        //TODO solo pubblicati
        $apartments_free_id = [];

        $now = Carbon::now();
        // Query per avere tutti gli appartamenti con la promozione attiva
        $apartments_premium = Promotion::has('apartment')
            ->where("date_end", ">=", "$now")
            ->get();
        // Trovo e metto in un array gli id degli appartamenti premium
        foreach ($apartments_premium as $apartment) {
            $apartments_free_id[] = $apartment->apartment->id;
        }
        // Trovo gli appartamenti free per differenza
        $apartments_free = Apartment::whereNotIn("id", $apartments_free_id)
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
    public function search(Request $request)
    {
        //     // TODO inserire decode del file json
        //     $request->validate([
        //         'search' => 'required|min:3'
        //     ]);
        //     // Get the search value from the request
        //     $search = $request->input('search');

        //     $apartments = Apartment::query()
        //         ->where('title', 'LIKE', "%{$search}%")
        //         ->get();

        //     return view('admin.search', compact('posts'));
    }
}
