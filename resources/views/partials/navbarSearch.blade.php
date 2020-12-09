
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
        {{-- Form del search --}}
        <form class="form-inline" method="get">
            <div class="input-group">
                <input id='address' name="address" class="form-control" type="text" placeholder="Search Apartements" aria-label="Search" value="{{ isset($search) ? $search : '' }}" required>

                {{-- bottone ricerca --}}
                <div class="input-group-append">
                    <button type="button" class="button_complete btn btn-primary" id="search"><i class="fas fa-search" aria-hidden="true"></i></button>
                </div>

                {{-- Ricerca Avanzata --}}
                <div class="dropdown advanced_search">
                    <button class="btn btn-primary dropdown-toggle" type="button"
                            id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                        <i class="fab fa-elementor"></i>
                        <span class="caret">Ricerca Avanzata</span>
                    </button>
                    <ul id="checkbox_list" class="dropdown-menu checkbox-menu allow-focus services_list" aria-labelledby="dropdownMenu1">
                        <h6 class="dropdown-header">Servizi</h6>
                        @foreach($services as $service)
                            <li>
                                <input class="checkbox_service" type="checkbox" value="{{$service->id}}">  {{$service->name}}
                            </li>
                        @endforeach

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>

                        <h6 class="dropdown-header">MQ Appartamento</h6>
                        <li>
                            <input type="number" id="mq">
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>

                        <h6 class="dropdown-header">Raggio Ricerca in Km</h6>
                        <li>
                            <div class="range-wrap" style="width: 80%;">
                                <input id="search_radius" name="radius" type="range" class="range" min="10" max="150" step="10" value="10">
                                <output class="bubble"></output>
                            </div>
                        </li>

                    </ul>
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
