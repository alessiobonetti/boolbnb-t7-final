jQuery(document).ready(function () {
   showRandomApartment();

});
function showRandomApartment() {

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

};
