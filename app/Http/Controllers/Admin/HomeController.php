<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Service;
use App\User;
use App\View;

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
        $apartments_free = Apartment::all()->promotion()->get();
        dd($apartments_free);
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

        if (!empty($data['services'])) {
            $newApartment->services()->sync($data['services']);
        }

        return redirect('admin/apartments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);

        return view('admin.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $apartment_services = [];
        foreach ($apartment->services as $apartment_service) {
            array_push($apartment_services, $apartment_service->id);
        }
        $services = Service::all();
        return view('admin.edit', compact('apartment', 'services', 'apartment_services'));
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
            'cover' => 'image|required',
        ]);

        $path = Storage::disk('public')->put('images', $data['cover']);

        $apartment = Apartment::findOrFail($id);
        $apartment->cover = $path;
        $apartment->fill($data)->update();

        if (!empty($data['services'])) {
            $apartment->services()->sync($data['services']);
        } else {
            $apartment->services()->detach();
        }

        return redirect('admin/apartments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $apartment = Apartment::find($id);
        if (Storage::disk('public')->exists($apartment->image)) {
            Storage::disk('public')->delete([$apartment->image]);
        };

        $apartment->delete();


        return redirect('admin/apartments');
    }
}
