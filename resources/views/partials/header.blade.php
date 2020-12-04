<header>
    @include('partials.navbar')
    <div id="banner"class="jumbotron">
        <script type="text/javascript"> 

            if (document.getElementById) { window.onload = swap };
            function swap() {
            var numimages=7;
            rndimg = new Array("/images/newyork.jpeg", "/images/paris.jpg", "/images/natura.jpg", "/images/brooklyn.jpg", "/images/cherry.jpg", "/images/sea.jpg", "/images/beach.jpg", "/images/spiaggia.jpg", "/images/m.jpg");
            x=(Math.floor(Math.random()*numimages));
            randomimage=(rndimg[x]);
            document.getElementById("banner").style.backgroundImage = "url("+ randomimage +")"; 
            }
            
        </script>
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
                
                <a href="/search" target="_blank">
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