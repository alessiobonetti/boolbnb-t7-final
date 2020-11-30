<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
<<<<<<< Updated upstream
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                          aria-label="Search">
                        <i class="fas fa-search" aria-hidden="true"></i>
=======
                        <input id='form' class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search Apartements" aria-label="Search" >
                        <a href="{{ url('search')}}"><button type="button" class="btn btn-light"><i id="search"class="fas fa-search" aria-hidden="true"></i></button></a>
>>>>>>> Stashed changes
                    </form>
                    <div class="links">
                        <a href="{{ url('search')}}"><h6 id="autocomplete"></h6></a>
                    </div>
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
                        $('#search').click(function(){
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
</nav>