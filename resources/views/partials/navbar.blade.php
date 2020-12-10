
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
                <input id="address"  name="address" type="text" class="form-control" placeholder="Inserisci una città" aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                <div class="input-group-append">
                    <button type="submit" class=" button_complete btn btn-primary"><i id="search" class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
                    </form>
        <div class="navbar-nav">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @auth
                    <a href="{{ url('/admin/apartments') }}">
                        <button type="button" class="btn btn-outline-primary">Dashboard</button>
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <button type="button" class="btn btn-outline-primary">Logout</button>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-outline-primary">Login</button>
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function () {
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



</nav>
