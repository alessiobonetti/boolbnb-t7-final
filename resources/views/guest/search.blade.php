

@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('header')
@include('partials.headerSearch')
@extends('layouts.main')
@endsection
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
@endsection

{{-- img fake --}}
{{-- <img class="img-fluid" src="@{{cover}}"> --}}

{{-- img path --}}
{{-- <img class="img-fluid" src="{{ asset('storage/') }}/@{{cover}}"> --}}
