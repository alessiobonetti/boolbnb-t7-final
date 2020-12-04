(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./resources/js/asset/random_show.js":
/*!*******************************************!*\
  !*** ./resources/js/asset/random_show.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {jQuery(document).ready(function () {
  showRandomApartment();
});

function showRandomApartment() {
  var lights = document.getElementsByClassName("random_show");
  var previousRandomLight = null;

  function repeatOften() {
    if (previousRandomLight) previousRandomLight.classList.toggle('active');
    var random = Math.floor(Math.random() * (lights.length - 1)) + 0;
    var randomLight = lights[random];
    randomLight.classList.toggle('active');
    previousRandomLight = randomLight;
    setTimeout(repeatOften, 1000);
  }

  repeatOften();
}

;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

}]);