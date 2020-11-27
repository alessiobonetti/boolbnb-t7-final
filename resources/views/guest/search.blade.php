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
                'url': 'https://api.tomtom.com/search/2/geocode/'+ title + '.json?radius=2000&key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm',
                'method': 'GET',
                'success': function(data){
                        var results = data.results;
                        console.log(results[0].viewport);       
                },
                'error':function(){
                    console.log('errore!');
                    }
                
            });
            // fine ajax
        }
        )}
    

</script>

    
@endsection