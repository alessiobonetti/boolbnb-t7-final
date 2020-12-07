$(document).ready(function () {
    // Ricerca Avanzata valore Raggio di ricerca
    $("#search_radius").mouseup(function() {
        var radiusVal = $("#search_radius").val();
        console.log(radiusVal);
        return radiusVal;
    });
    checkboxCheck (check_wifi);
});

// Logica label per raggio di ricerca
const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
  const range = wrap.querySelector(".range");
  const bubble = wrap.querySelector(".bubble");

  range.addEventListener("input", () => {
    setBubble(range, bubble);
  });
  setBubble(range, bubble);
});

function setBubble(range, bubble) {
  const val = range.value;
  const min = range.min ? range.min : 0;
  const max = range.max ? range.max : 100;
  const newVal = Number(((val - min) * 100) / (max - min));
  bubble.innerHTML = val;

  // Sorta magic numbers based on size of the native UI thumb
  bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}


// Valore dei checked

function checkboxCheck (id) {
    var checked = $('check_wifi').prop('checked');
    console.log(checked);
}

