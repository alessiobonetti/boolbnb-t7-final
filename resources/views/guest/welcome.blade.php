@extends('layouts.main')
@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('content')
    {{-- <div class="container_apartments">
        <div class="apartments_premium">
            @foreach ($apartments_premium as $apartment_premium)
                <div class="apartment_premium_box">
                    <h3>{{ $apartment_premium['title'] }}</h3>
                    <img src="{{$apartment_premium['cover']}}" alt="cover">
                    <p>{{ $apartment_premium['description'] }}</p>
                    {{-- <a href="{{ route('guest.show') }}"> --}}{{-- <button class="badge badge-info">Info</button></a>
                </div>
            @endforeach
        </div>
        <div class="apartments_free">
            @foreach ($apartments_free as $apartment_free)
                <div class="apartment_free_box">
                    <h3>{{ $apartment_free['title'] }}</h3>
                    <img src="{{$apartment_free['cover']}}" alt="cover">
                    <p>{{ $apartment_free['description'] }}</p>
                    <button class="badge badge-info">Info</button></a>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="container_apartments">
        <div class="row">
            @foreach ($apartments_premium as $apartment_premium)
                <div class="card-deck col-md-6 col-lg-4 col-12">
                    <div class="card change_class premium_class">
                        <img class="card-img-top" src="{{ filter_var($apartment_premium->cover, FILTER_VALIDATE_URL) ?  $apartment_premium->cover : asset('storage/' . $apartment_premium->cover) }}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{ $apartment_premium['title'] }}</h5>
                        <p class="card-text">{{ $apartment_premium['description'] }}</p>
                        </div>
                        <div class="card-footer span2">
                            <a href="{{ url('apartment', $apartment_premium['id']) }}"><button class="btn-block badge badge-info">Info</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($apartments_free as $apartment_free)
                <div class="card-deck col-md-6 col-lg-4 col-12">
                    <div class="card change_class">
                        <img class="card-img-top" src="{{ filter_var($apartment_free->cover, FILTER_VALIDATE_URL) ?  $apartment_free->cover : asset('storage/' . $apartment_free->cover) }}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{ $apartment_free['title'] }}</h5>
                        <p class="card-text">{{ $apartment_free['description'] }}</p>
                        </div>
                        <div class="card-footer span2">
                            <a href="{{ url('apartment', $apartment_free['id']) }}"><button class="btn-block badge badge-info">Info</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    

@endsection


