// This function runs when the document is ready
$(document).ready(function () {
  // Initialize WOW.js for reveal animations when you scroll
  new WOW().init();

  // Remove the classes "wow" and "none" from the element with id "preloader"
  $("#preloader").removeClass("wow", "none");

  // Set the width and margin of the element with id "example_wrapper"
  $("#example_wrapper").css("width", "80%");
  $("#example_wrapper").css("margin", "auto");

  // Set the width of the element with id "suscription"
  $("#suscription").css("width", "140px");

  // Add a top margin to the element with id "input_suscription"
  $("#input_suscription").css("margin-top", "1%");

  // Hide the element with id "preloader"
  $("#preloader").css("display", "none");

  // Store the original placeholder text of all input and textarea elements
  $("input, textarea").data("holder", $("input, textarea").attr("placeholder"));

  // Remove the placeholder text when an input or textarea receives focus
  $("input, textarea").focusin(function () {
    $(this).attr("placeholder", "");
  });

  // Restore the original placeholder text when an input or textarea loses focus
  $("input, textarea").focusout(function () {
    $(this).attr("placeholder", $(this).data("holder"));
  });

  // Add or remove the class "animated" from the element with class "navigation" based on the scroll position
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 200) {
      $(".navigation").addClass("animated");
    } else {
      $(".navigation").removeClass("animated");
    }
  });
});
