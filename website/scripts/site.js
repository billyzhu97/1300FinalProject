$(document).ready(function() {

  //bxslider for Home page
  $('.slider').bxSlider({
    slideWidth: 800
  });

  //code for icon interactions on About page
  $("#icon1").click(function() {
    $("#objective").text("To draw attention to the value of medical relief and humanitarian aid");
    $("#icon1").addClass("selected");
    $("#icon2").removeClass("selected");
    $("#icon3").removeClass("selected");
    $("#icon4").removeClass("selected");
  });

  $("#icon2").click(function() {
    $("#objective").text("To educate students about national and international health issues, while simultaneously striving to engage students and the public in the response to such issues");
    $("#icon1").removeClass("selected");
    $("#icon2").addClass("selected");
    $("#icon3").removeClass("selected");
    $("#icon4").removeClass("selected");
  });

  $("#icon3").click(function() {
    $("#objective").text("To engage the student population in fundraising initiatives that support the work of the designated organization the Cornell Association of Medical Philanthropy partners with each year");
    $("#icon1").removeClass("selected");
    $("#icon2").removeClass("selected");
    $("#icon3").addClass("selected");
    $("#icon4").removeClass("selected");
  });

  $("#icon4").click(function() {
    $("#objective").text("To provide a platform for students with pre-medical or related interests an opportunity to explore the medical field, gain academic and social support as well as diversify their knowledge of various medical careers. ");
    $("#icon1").removeClass("selected");
    $("#icon2").removeClass("selected");
    $("#icon3").removeClass("selected");
    $("#icon4").addClass("selected");
  });

  //Toggle Applications for the Reach Us page
  $("#formLabel").click(function() {
    $("#appLink").toggle();
  });

  $("#messageLabel").click(function() {
    $("#commentForm").toggle();
  });


  // Client-Side Validation for form submission:
  $("#commentForm").on("submit", function() {
    console.log("hello");

      formValid = true;

      nameIsValid = $("#name").prop("validity").valid;
      if(nameIsValid) {
        $("#nameError").hide();
      } else {
        $("#nameError").show();
        formValid = false;
      }

      emailIsValid = $("#mail").prop("validity").valid;
      if(emailIsValid) {
        $("#emailError").hide();
      } else {
        $("#emailError").show();
        formValid = false;
      }

      messageIsValid = $("#comment").prop("validity").valid;
      if(messageIsValid) {
        $("#messageError").hide();
      } else {
        $("#messageError").show();
        formValid = false;
      }

      if ($("input[type=radio]:checked").length > 0) {
      $("#statusError").hide();
      } else {
      $("#statusError").show();
      formValid = false;
    }

      return formValid;
    });


});
