<nav class="navbar navbar-expand-md navbar-light bg-light" id="main_navbar">
    <a href="{{url('')}}" class="navbar-brand">BoolBnB</a>
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
                    <button type="button" class=" button_complete btn btn-secondary"><i id="search" class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
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
</nav>