$(document).ready(function () {
  $("#wrong-email").hide();

  $(".form-control").focus(function () {
    $(this).css({ background: "rgb(233, 244, 233)" });
  });

  $(".form-control").blur(function () {
    if (validateForm()) {
      $(this).css({ background: "white" });
      $("#wrong-email").hide();
    } else {
      $(this).css({ background: "#FED5D5" });
      $("#wrong-email").show();
    }
  });

  function validateForm() {
    const email = $("#InputEmail").val();
    var regexp =
      /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexp.test(String(email).toLowerCase());
  }
});
