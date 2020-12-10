
<header>
    @include('partials.navbarSearch')
    <div id="banner"class="jumbotron">
        <div id="banner"></div>
        <div class="container">
            <div class="motto">
                <div class="container_header_title">
                    <div class="box">

                        <div class="header_title">
                            <span class="block"></span>
                            <h1>BoolBnB<span></span></h1>
                        </div>

                        <div class="role">
                            <div class="block"></div>
                            <p class="header_title_p">L'Appartamento per Te</p>
                        </div>

                    </div>
                </div>

                <a href="{{ url('admin/apartments') }}" target="_self">
                    <div class="header_title_footer">
                        <div class="texto">
                            <span>
                                <i class="fas fa-house-user"></i>
                                Inserisci il tuo appartamento
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</header>
