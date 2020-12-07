
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
