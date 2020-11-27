@extends('layouts.main')
@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('content')
    <div class="container">
        <div class="apartments_premium">
            @foreach ($apartments_premium as $apartment_premium)
                <div class="apartment_premium_box">
                    <h3>{{ $apartment_premium['title'] }}</h3>
                    <img src="{{$apartment_premium['cover']}}" alt="cover">
                    <p>{{ $apartment_premium['description'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="apartments_free">
            @foreach ($apartments_free as $apartment_free)
                <div class="apartment_free_box">
                    <h3>{{ $apartment_free['title'] }}</h3>
                    <img src="{{$apartment_free['cover']}}" alt="cover">
                    <p>{{ $apartment_free['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
    

@endsection


