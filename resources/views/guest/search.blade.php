
@extends('layouts.main')
@section('content')
    <div class="container mt-3">

        <input type="text" id='form'>
        <p id="autocomplete"></p>
        <button id='button'>INVIA</button>
    </div>


    {{-- Inserito cdn jquery - modificare librerie --}}
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
                },
                'error':function(){
                    console.log('errore!');
                    }
        });

    }


</script>


@endsection
