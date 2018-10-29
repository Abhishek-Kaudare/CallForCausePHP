document.addEventListener("change", function (event) {
  let element = event.target;
  if (element && element.matches(".form-element-field")) {
    element.classList[element.value ? "add" : "remove"]("-hasvalue");
  }
});



const map = document.getElementById("mps");
const venue = document.getElementById("venue_url");

venue.addEventListener("change", function(e) {
  if (String(venue.value).length > 0){
    let url = String(venue.value);
    let query = url.split(" ").join("+");
    let url1 =
      "<iframe class='resp-iframe' width='560' height='315' frameborder='1' style='border: 0' src='https://www.google.com/maps/embed/v1/place?q=";
    let url2 = "&key=AIzaSyCLM6xadDFjiTTGw3w_Wg1HSPjOLx1sUwk' allowfullscreen></iframe >";
    map.innerHTML = url1 + query + url2;
  }
  
});

function venueMap(e) {
  if (String(venue.value).length > 0) {
    let url = String(venue.value);
    let query = url.split(" ").join("+");
    let url1 =
      "<iframe class='resp-iframe' width='560' height='315' frameborder='1' style='border: 0' src='https://www.google.com/maps/embed/v1/place?q=";
    let url2 = "&key=AIzaSyCLM6xadDFjiTTGw3w_Wg1HSPjOLx1sUwk' allowfullscreen></iframe >";
    map.innerHTML = url1 + query + url2;
  }

};

window.onload = venueMap();