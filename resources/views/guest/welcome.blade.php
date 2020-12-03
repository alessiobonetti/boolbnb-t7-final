@include('partials.header')
@extends('layouts.main')
@section('title')
    BoolBnB - Sito Ufficile
@endsection

@section('content')

    {{-- container appartamenti --}}
    <div class="container_apartments container">
        {{-- appartamenti premium titolo --}}
        <div class="apartments_premium_title">
            <h3>i nostri appartamenti premium</h3>
        </div>
        <div class="row">
            {{-- appartamenti premium --}}
            @foreach ($apartments_premium as $apartment_premium)
                <div class="margin_top_20 col-md-6 col-lg-4 col-12">
                    <div class="card-deck ">
                        <div class="content premium_class">
                            <a href="{{ url('apartment', $apartment_premium['id']) }}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ filter_var($apartment_premium->cover, FILTER_VALIDATE_URL) ?  $apartment_premium->cover : asset('storage/' . $apartment_premium->cover) }}" alt="Card image cap">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{ $apartment_premium['title'] }}</h3>
                                    <p class="content-text"><i class="fa fas-info"></i> Clicca per maggiori informazioni</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            {{-- appartamenti free --}}
            @foreach ($apartments_free as $apartment_free)
                <div class="margin_top_20 col-md-6 col-lg-3 col-12">
                    <div class="card-deck random_show">
                        <div class="content content_free mr-3 w-75">
                            <a href="{{ url('apartment', $apartment_free['id']) }}">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ filter_var($apartment_free->cover, FILTER_VALIDATE_URL) ?  $apartment_free->cover : asset('storage/' . $apartment_free->cover) }}" alt="Card image cap">
                                <div class="content-details fadeIn-bottom">
                                    <h3 class="content-title">{{ $apartment_free['title'] }}</h3>
                                    <p class="content-text"><i class="fa fas-info"></i> Clicca per maggiori informazioni</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container container_search">
        <div class="row row_search">

        </div>
    </div>

{{-- Inserito cdn jquery - modificare librerie --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    (function showRandomApartment() {

    var lights = document.getElementsByClassName("random_show");
    var previousRandomLight = null

    function repeatOften() {
    if (previousRandomLight) previousRandomLight.classList.toggle('active')
    var random = Math.floor(Math.random() * (lights.length - 1)) + 0;
    var randomLight = lights[random];
    randomLight.classList.toggle('active');
    previousRandomLight = randomLight;
    setTimeout(repeatOften, 1000);
    }
    repeatOften();

    })();

</script>




@endsection


