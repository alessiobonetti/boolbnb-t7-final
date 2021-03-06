{{-- prima navbar fatta --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="main_navbar">
    <div class="container">
        <div class="row width_100">
            {{-- logo --}}
            <div class="col col-xs-8">
                <div class="navbar-nav mr-auto links">
                    <a href="{{url('')}}"><h1>BoolBnB</h1> </a>
                </div>
            </div>
             {{-- /logo --}}

            {{-- colapse right --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{--  searchbar --}}
                <div class="col">
                    <form class="form-inline ">
                        <input id='form' class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search Apartements" aria-label="Search" >
                        <button type="button" class="button_complete btn btn-light"><i id="search"class="fas fa-search" aria-hidden="true"></i></button>
                    </form>
                    <div>
                        <button type="button" class="button_complete btn btn-light"> <h6 id="autocomplete"></h6></button>

                    </div>
                </div>
                {{--  /searchbar --}}

                {{--  Authentication --}}
                <div class="col col-lg-3 d-flex flex-row-reverse">
                    <div class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/admin/apartments') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
                {{--  /Authentication --}}
            </div>

            {{-- hamburger --}}
            <div class="col-auto col-xs-4 d-flex flex-row-reverse">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            {{-- hamburger --}}
            
        </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            $("#search_apartments_premium").append(html);
        }


    }


</script> --}}
</nav>

{{-- navbar vecchia --}}
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
        <form class="form-inline" action="{{ route('guest.response') }}" method="get">
            <div class="input-group">                    
                <input id='form' type="text" class="form-control" placeholder="Inserisci una città" aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                <div class="input-group-append">
                    <button type="button" class=" button_complete btn btn-primary"><i id="search" class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
            <!-- Authentication Links -->
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @auth

                    <a href="{{ url('/admin/apartments') }}">
                        <button type="button" class="btn btn-outline-primary">Home</button>
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