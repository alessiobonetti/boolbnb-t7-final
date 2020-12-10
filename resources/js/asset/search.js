$(document).ready(function () {

    autocompleteTomTom();
    ajaxCall();
    requestAjaxSearch();

});
// Autocompletamento
function autocompleteTomTom(){
    $('#address').keyup(function () {
        // salvare il dato
        var letter = $('#address').val();
        $.ajax({
            // E' possibile aggiungere degli argomenti opzionali alla chiamata ->vedi guida api TomTom fuzzy search
            'url': 'https://api.tomtom.com/search/2/search/'+ letter + '.json?key=qSDJhLAxaQVApzhQYzYHIRVtb03Dnkqm&language=it-IT&limit=5',
            'method': 'GET',
            'success': function (data) {
                console.log(length(data.results));
                    // Esempio di autocompilazione con il municipio -> vedi guida api TomTom fuzzy search
                    $('#autocomplete').text(data.results[0].address.municipality);


            },
            'error':function(){
                console.log('errore!');
                }
        });

    })
}
// Chimata ajax con i dati del form
function ajaxCall() {
    //    salvare il dato
    var title = $('#address').val();
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
}
// Chimata ajax in search
function requestAjaxSearch(){
    $('#search').click(function () {
        ajaxCall()

        })
    }
// Elaborazione della query a Backend su richiesta della chiamata ajax
function requestTomTom(query) {
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
            'radius': $('#search_radius').val(),

            'services': checkboxCheck(),
            'rooms': $('#rooms').val(),
            'beds': $('#beds').val(),
            'baths': $('#baths').val(),
            'mq': $('#mq').val(),
        },
        'success': function (data) {

            // data contiene la ns risposta. gli appartamenti!
            renderApartment_premium(data['premium']);
            renderApartment_free(data['free']);
            },
            'error':function(){
                console.log('errore!');
                }
    });
}
// Renderizzazione richieste ajax
function renderApartment_premium(ele) {
    $('#apartments_premium').html('');

    var source = $("#apartments_template_premium").html();
    var template = Handlebars.compile(source);


    for (var i = 0; i < ele.length; i++) {

        var context = {
            "apartmentId": ele[i].id,
            "cover": ele[i].cover,
            "title": ele[i].title,
            "description": ele[i].description
        };

        var html = template(context);
        $("#apartments_premium").append(html);
    }
}

function renderApartment_free(ele) {

 $('#apartments_free').html('');


    var source = $("#apartments_template_free").html();
    var template = Handlebars.compile(source);

    for(var i =0; i<ele.length; i++){

            var context = {
            "apartmentId": ele[i].id,
            "cover": ele[i].cover,
            "title": ele[i].title,
            "description":ele[i].description
            };

        var html = template(context);
        $("#apartments_free").append(html);
    }
}

function search_radius() {
    // Ricerca Avanzata valore Raggio di ricerca
    $("#search_radius").mouseup(function() {
        var radiusVal = $("#search_radius").val();
        return radiusVal;
    });


}

// Logica label per raggio di ricerca
const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
  const range = wrap.querySelector(".range");
  const bubble = wrap.querySelector(".bubble");

  range.addEventListener("input", () => {
    setBubble(range, bubble);
  });
  setBubble(range, bubble);
});

function setBubble(range, bubble) {
  const val = range.value;
  const min = range.min ? range.min : 10;
  const max = range.max ? range.max : 150;
  const newVal = Number(((val - min) * 100) / (max - min));
  bubble.innerHTML = val;

  // Sorta magic numbers based on size of the native UI thumb
  bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}


// Valore dei checked in un array

function checkboxCheck() {
    var service_array = [];
    var checkbox_service = $('input[type=checkbox]').each(function () {
        var status = (this.checked ? service_array.push($(this).val()) : "");
    });
    return service_array;
    //console.log(service_array);
}

