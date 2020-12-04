
<nav class="navbar navbar-expand-md navbar-light " id="main_navbar">
    <div class="navbar_logo">
        <a href="{{url('')}}"><img src="/images/logo.png" alt="img_logo"></a>
    </div>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="{{url('')}}" class="nav-item nav-link active">Home</a>
        </div>
        <form class="form-inline" method="get">
            <div class="input-group">
                <input id='address' name="address" class="form-control" type="text" placeholder="Search Apartements" aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                <div class="input-group-append">
                    <button type="button" class="button_complete btn btn-primary" id="search"><i class="fas fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>
        <div class="navbar-nav">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @auth
                    <a href="{{ url('/admin/apartments') }}">
                        <button type="button" class="btn btn-outline-primary">Dashboard</button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-outline-success">Login</button>
                    </a>

                    @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <button type="button" class="btn btn-outline-primary">Register</button>
                            </a>
                    @endif
                @endauth

            </div>
        </div>
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
$(document).ready(function () {


    autocompleteTomTom();
    //    salvare il dato
    var title = $('#address').val();
    console.log(title);
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
});
// Autocompletamento
function autocompleteTomTom(){
    $('#address').keyup(function(){
        // salvare il dato
        var letter = $('#address').val();
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
function requestTomTom(query){
    $.ajax({
        // Rotta response
        'url': 'http://localhost:8000/search?address=',
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
</script>
