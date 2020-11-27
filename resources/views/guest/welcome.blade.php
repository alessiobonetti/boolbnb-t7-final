@extends('layouts.main')
@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('content')
    <div class="container">
        <div class="apartments-container"></div>
    </div>
    <div class="apartments-premium">
        @foreach ($apartments as $apartment_premium)
            <div class="apartment_premium_box">
                <h3>{{ $apartment_premium['title'] }}</h3>
                <h3>{{ $apartment_premium['description'] }}</h3>

            </div>
        @endforeach
        
    </div>

@endsection


