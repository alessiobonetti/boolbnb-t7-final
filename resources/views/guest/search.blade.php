
@extends('layouts.main')
@section('content')
    <input type="text" id='form'>
    <button id='button'>INVIA</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $( document ).ready(function() {
        callTomTom();
    });


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
                        requestTomTom(results);
                },
                'error':function(){
                    console.log('errore!');
                    }
            });
            // fine ajax
        }
        )}

    function requestTomTom(query){
        console.log(query);
        $.ajax({
            'url': '{{route('guest.response')}}',
            'method': 'POST',
            'data':{
                '_token': '{{ csrf_token() }}',
                'query_lat': query.lat,
                'query__long': query.lon,
            },
            'success': function(data){
                        console.log(data);
                },
                'error':function(){
                    console.log('errore!');
                    }
        });
        // fine ajax
    }


</script>


@endsection
