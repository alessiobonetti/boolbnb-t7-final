@extends('layouts.main')

@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('header')
    @include('partials.headerSearch')
@endsection
@section('content')

    <div id="apartments_premium" class="container">
    </div>



{{-- Qui sono dentro a search --}}
    {{-- handlebars template --}}
<script id="apartments_template" type="text/x-handlebars-template">
    <div class="container_apartments mb-3">
        <div class="card-deck col">
            <div class="card change_class premium_class">
                <img class="card-img-top" src="@{{cover}}">

                <div class="card-body">
                    <h5 class="card-title">@{{title}}</h5>
                    <p class="card-text">@{{description}}</p>
                </div>

                <div class="card-footer span2">
                    <a href="apartment/@{{apartmentId}}"><button class="btn-block badge badge-info">Info</button></a>
                </div>
            </div>
        </div>
    </div>
</script>
@endsection
