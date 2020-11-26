<?php

namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        return view('guest.welcome', compact('apartments'));
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
