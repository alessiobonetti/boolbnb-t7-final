require('./bootstrap');

require('startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js');
require('startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js');
require('startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js');
require('startbootstrap-sb-admin-2/js/sb-admin-2.min.js');
require('startbootstrap-sb-admin-2/vendor/chart.js/Chart.min.js');
require('startbootstrap-sb-admin-2/js/demo/chart-area-demo.js');
require('startbootstrap-sb-admin-2/js/demo/chart-pie-demo.js');



//Show random apartment free
(function showRandomApartment() {

    var lights = document.getElementsByClassName("random_show");
    var previousRandomLight = null
    
    function repeatOften() {
      if (previousRandomLight) previousRandomLight.classList.toggle('active')
      var random = Math.floor(Math.random() * (lights.length - 1)) + 0;
      var randomLight = lights[random];
      randomLight.classList.toggle('active');
      previousRandomLight = randomLight;
      setTimeout(repeatOften, 1000);
    }
    repeatOften();
    
})();

