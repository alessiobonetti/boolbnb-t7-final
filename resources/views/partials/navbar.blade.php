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
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                          aria-label="Search" id='form'>
                        <i class="fas fa-search" aria-hidden="true" id='button'></i>
                    </form>
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

