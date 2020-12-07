$(document).ready(function () {
    swap();
});

function swap() {
    var numimages=8;
    rndimg = new Array("/images/paris.jpg", "/images/natura.jpg", "/images/sydney.jpg", "/images/cherry.jpg", "/images/sea.jpg", "/images/beach.jpg", "/images/spiaggia.jpg", "/images/m.jpg");
    x=(Math.floor(Math.random()*numimages));
    randomimage=(rndimg[x]);
    document.getElementById("banner").style.backgroundImage = "url("+ randomimage +")";
}
