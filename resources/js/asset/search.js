$(document).ready(function () {

    requestAjaxSearch();
    autocompleteTomTom();
    //    salvare il dato
    var title = $('#address').val();
    console.log(title);
    //effettutare chiamata ajax
    $.ajax({
        'url': 'https://api.tomtom.com/search/2/geocode/'+ title + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm',
        'method': 'GET',
        'success': function(data){
                var results = data.results[0].position;
                //uso la funzione requestTomTom per incrociare lat e lng richiesta dall'utente con gli appartamenti presenti a DB
                requestTomTom(results);
                //console.log(results);
        },
        'error':function(){
            console.log('errore!');
            }
    });
});
// Autocompletamento
function autocompleteTomTom(){
    $('#address').keyup(function(){
        // salvare il dato
        var letter = $('#address').val();
        //console.log(letter);
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
function requestAjaxSearch(){
        $('#search').click(function(){

            // salvare il dato
            var title = $('#address').val();
            // effettutare chiamata ajax
            $.ajax({
                'url': 'https://api.tomtom.com/search/2/geocode/'+ title + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm',
                'method': 'GET',
                'success': function(data){
                        var results = data.results[0].position;
                        //uso la funzione requestTomTom per incrociare lat e lng richiesta dall'utente con gli appartamenti presenti a DB
                        requestTomTom(results);
                },
                'error':function(){
                    console.log('errore!');
                    }
            });

        })
    }
// Elaborazione della query a Backend su richiesta della chiamata ajax
function requestTomTom(query) {

           // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

    $.ajax({
        // Rotta response
        'url': 'http://localhost:8000/search',
        'dataType': 'json',
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'method': 'POST',
        'data':{
            // le coordinate da mandare al back-end
            'query_lat': query.lat,
            'query__long': query.lon,
        },
        'success': function(data){
            // data contiene la ns risposta. gli appartamenti!
                //console.log(data);
                renderApartment(data)
            },
            'error':function(){
                console.log('errore!');
                }
    });
}
// Renderizzazione richieste ajax
function renderApartment(ele){
    $('#apartments_premium').html('');
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
