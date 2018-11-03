var animateButton = function(e) {
  e.preventDefault;
  //reset animation
  e.target.classList.remove("animate");

  e.target.classList.add("animate");
  setTimeout(function() {
    e.target.classList.remove("animate");
  }, 700);
};

var bubblyButtons = document.getElementsByClassName("pet-sign-btn");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener("click", animateButton, false);
}


// const register = document.getElementById("pet-id");
// $("document").ready(function () {
//   $(".pet-sign-btn").click(function() {
//     var data = { action: "register" };
//     data = $(this).serialize() + "&" + $.param(data);
//     $.ajax({
      
//       type: "POST",
//       dataType: "json",
//       url: "http://localhost/CallForCause/app/controllers/events/attend", //Relative or absolute path to response.php file
//       data: data,
      
//       success: function(data) {
//         console.log("success");

//         alert("Form submitted successfully.\nReturned json: " + data["json"]);
//       }
//     });
//     return false;
//   });
// });