@include('partials.headerSearch')
@extends('layouts.main')
@section('content')
    <div class="search_filters">

    </div>
{{-- struttura boolstrap visualizzazione appartamenti --}}
    
    <div id="apartments_premium" class="container">
    </div>

    



{{-- Qui sono dentro a search --}}
    {{-- handlebars template --}}
<script id="apartments_template" type="text/x-handlebars-template">
    <div class="container search_container">
        <div class="row">
            <div class="col-xs-8">
                <img class="img-fluid" src="@{{cover}}">
            </div>
            <div class="col-xs-4">
                <h5 class="card-title">@{{title}}</h5>
                <p class="card-text text">@{{description}}</p>
                <div class="w-100 divider"></div>
                <a href="apartment/@{{apartmentId}}"><button type="button" class="btn btn-outline-primary">Informazioni</button></a>
            </div>



            
        </div>
    </div>
</script>


{{-- Inserito cdn jquery - modificare librerie --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@endsection
