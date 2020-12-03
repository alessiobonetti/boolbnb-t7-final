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
            <a href="#" class="nav-item nav-link">Profile</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Messages</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Inbox</a>
                    
                    <a href="#" class="dropdown-item">Drafts</a>
                </div>
            </div>
        </div>
        <form class="form-inline">
            <div class="input-group">                    
                <input id='form' type="text" class="form-control" placeholder="Inserisci una città" aria-label="Search">
                <div class="input-group-append">
                    <button type="button" class=" button_complete btn btn-primary"><i id="search" class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
            <!-- Authentication Links -->
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @auth

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

            {{-- hamburger --}}
            <div class="col-auto col-xs-4 d-flex flex-row-reverse">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            {{-- hamburger --}}
            
        </div>
    </div>
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



</nav>