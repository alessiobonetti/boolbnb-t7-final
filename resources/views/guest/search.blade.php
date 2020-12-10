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
<div class="container">
    <div class="row row_search">
        <div class="col-sm-12 col-md-6" >
            <div id="apartments_premium"></div>
        </div>
    </div>
</div>


{{-- Qui sono dentro a search --}}
    {{-- handlebars template --}}
<script id="apartments_template" type="text/x-handlebars-template">
    <div class="content_search">
        <img src="@{{cover}}" class="img-fluid" alt="Responsive image">
        <div class="content_down_img">
            <h5 >@{{title}}</h5>
            <a href="apartment/@{{apartmentId}}"><button type="button" class="btn btn-outline-primary">Informazioni</button></a>
        </div>
    </div>
   
</script>
@endsection

