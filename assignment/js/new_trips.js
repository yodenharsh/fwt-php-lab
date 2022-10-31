$(document).ready(function () {
  $(".error-box").hide();
  $("#submit-btn").prop("disabled", true);
  function validInput() {
    var radioValue = $("input[name='country']:checked").val();
    if (!!$("#year").val() && !!$("#people").val() && !!radioValue) {
      $("#submit-btn").removeAttr("disabled");
    }
  }
  $("#terms-no").click(function () {
    $(".error-box").show("fast");
    $("#submit-btn").prop("disabled", true);
    console.log("triggered");
  });

  $("#terms-yes").click(function () {
    $(".error-box").hide("fast");
    validInput();
    console.log("triggered");
  });
});
