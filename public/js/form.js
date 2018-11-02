document.addEventListener("change", function(event) {
  let element = event.target;
  if (element && element.matches(".form-element-field")) {
    element.classList[element.value ? "add" : "remove"]("-hasvalue");
  }
});

var Youtube = (function() {
  "use strict";

  var video, results;

  var getThumb = function(uri, size) {
    // url = uri;
    const url = String(uri);
    if (url === null) {
      return "";
    }
    // console.log(uri);

    size = size === null ? "big" : size;
    results = url.match("[\\?&]v=([^&#]*)");
    video = results === null ? url : results[1];

    if (size === "small") {
      return "http://img.youtube.com/vi/" + String(video) + "/2.jpg";
    }
    return "http://img.youtube.com/vi/" + String(video) + "/0.jpg";
  };

  return {
    thumb: getThumb
  };
})();

const video_thumb = document.getElementById("video_thumb");
const video_url = document.getElementById("video_url");

// Call for edit function to display Video Thumbnail

let url = String(video_url.value);
console.log(url.length);
if (url.length > 0) {
  console.log("1");

  var thumb = Youtube.thumb(url);
  video_thumb.setAttribute("src", thumb);
} else {
  video_thumb.removeAttribute("src");
}
video_url.addEventListener("change", function(e) {
  let url = String(video_url.value);
  if (url.length > 0) {
    var thumb = Youtube.thumb(url);
    video_thumb.setAttribute("src", thumb);
  } else {
    video_thumb.removeAttribute("src");
  }
});

  $("document").ready(function(){
    $(".js-ajax-php-json").submit(function () {
      var data = {
        "action": "test"
      };
      data = $(this).serialize() + "&" + $.param(data);
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "response.php", //Relative or absolute path to response.php file
        data: data,
        success: function (data) {
          $(".the-return").html(
            "Favorite beverage: " + data["favorite_beverage"] + "<br />Favorite restaurant: " + data["favorite_restaurant"] + "<br />Gender: " + data["gender"] + "<br />JSON: " + data["json"]
          );

          alert("Form submitted successfully.\nReturned json: " + data["json"]);
        }
      });
      return false;
    });
  });