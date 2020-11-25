<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\User;
use App\View;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $apartments = Apartment::all()->where('user_id', $id);
        return view('admin.index', compact('apartments',));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        return view('admin.create', compact('services', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();



        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'rooms' => 'required|min:1',
            'beds' => 'required|min:1',
            'baths' => 'required|min:1',
            'mq' => 'required|min:1',
            'address' => 'required|max:60',
            'published' => 'boolean',
            'cover' => 'required|image',
        ]);

        $path = Storage::disk('public')->put('images', $data['cover']);

        $newApartment = new Apartment;
        $newApartment->fill($data);
        $newApartment->cover = $path;
        $newApartment->user_id = Auth::id();
        $newApartment->save();

        if (count($data['services']) > 0) {
            $newApartment->services()->sync($data['services']);
        }
<<<<<<< HEAD

        return redirect('admin.apartments.index');
=======
        return redirect('admin');
>>>>>>> 3997aa36936d2d20c269c3c06249c42bd28908b3
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('ciao');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('ciao');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
