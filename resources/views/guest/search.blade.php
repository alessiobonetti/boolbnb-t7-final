
@extends('layouts.main')
@section('content')
{{-- qui arrivo dalla welcome e uso blade --}}
<div class="container">
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="card-deck col-4 mb-2">
            <div class="card change_class premium_class">
                <img class="card-img-top" src="{{$apartment->cover}}">

                <div class="card-body">
                    <h5 class="card-title">{{$apartment->title}}</h5>
                    <p class="card-text">{{$apartment->description}}</p>
                </div>

                <div class="card-footer span2">
                    <a href="apartment/{{$apartment->apartmentId}}"><button class="btn-block badge badge-info">Info</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Qui sono dentro a search --}}
    {{-- handlebars template --}}
    <script id="apartments_template" type="text/x-handlebars-template">
        <div class="container_apartments">
            <div class="card-deck col-12">
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
<script>
        $( document ).ready(function() {
        autocompleteTomTom();
        callTomTom();
    });

    function autocompleteTomTom(){
        $('#form').keyup(function(){
            // salvare il dato
            var letter = $('#form').val();
            console.log(letter);
            $.ajax({
                // E' possibile aggiungere degli argomenti opzionali alla chiamata ->vedi guida api TomTom fuzzy search
                'url': 'https://api.tomtom.com/search/2/search/'+ letter + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm&language=it-IT',
                'method': 'GET',
                'success': function(data){
                        console.log(data);
                        // Esempio di autocompilazione con il municipio -> vedi guida api TomTom fuzzy search
                        $('#autocomplete').text(data.results[0].address.municipality);
                },
                'error':function(){
                    console.log('errore!');
                    }
            });

        })
    }
    // Chiamata ajax a TomTom per latitudine e longitudine dell'indirizzo ricercato
    function callTomTom(){
        $('#button').click(function(){
            // salvare il dato
            var title = $('#form').val();
            // effettutare chiamata ajax
            $.ajax({
                'url': 'https://api.tomtom.com/search/2/geocode/'+ title + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm',
                'method': 'GET',
                'success': function(data){
                        var results = data.results[0].position;
                        //uso la funzione requestTomTom per incrociare lat e lng richiesta dall'utente con gli appartamenti presenti a DB
                        requestTomTom(results);
                        console.log(results);
                },
                'error':function(){
                    console.log('errore!');
                    }
            });

        })
    }
    // Elaborazione della query a Backend su richiesta della chiamata ajax
    function requestTomTom(query){
        console.log(query);
        $.ajax({
            // Rotta response
            'url': '{{route('guest.response')}}',
            'method': 'POST',
            'data':{
                // token
                '_token': '{{ csrf_token() }}',
                // le coordinate da mandare al back-end
                'query_lat': query.lat,
                'query__long': query.lon,
            },
            'success': function(data){
                // data contiene la ns risposta. gli appartamenti!
                    console.log(data);
                    renderApartment(data)
                },
                'error':function(){
                    console.log('errore!');
                    }
        });

    }

    function renderApartment(ele){

        var source = $("#apartments_template").html();
        var template = Handlebars.compile(source);

        for(var i =0; i<ele.length; i++){

             var context = {
             "apartmentId": ele[i].id,
             "cover": ele[i].cover,
             "title": ele[i].title,
             "description":ele[i].description
             };

            var html = template(context);
            $("#apartments_premium").append(html);
        }


    }


</script> --}}


@endsection
