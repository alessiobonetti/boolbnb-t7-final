
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
                    <form class="form-inline" action="{{ route('guest.response') }}" method="get">
                        <input id='address' name="address" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search Apartements" aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                        <button type="submit" class="button_complete btn btn-light" id="search"><i class="fas fa-search" aria-hidden="true"></i></button>
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
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {

    requestAjaxWelcome();
    autocompleteTomTom();
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

</script>


