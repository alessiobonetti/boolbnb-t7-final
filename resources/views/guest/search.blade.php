@include('partials.headerSearch')
@extends('layouts.main')
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


{{-- Inserito cdn jquery - modificare librerie --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@endsection
