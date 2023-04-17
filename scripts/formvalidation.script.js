$(document).ready(function () {
  $("#product_form").on("submit", function (event) {
    event.preventDefault();

    let formIsValid = true;

    //feedback messages
    const emptyField = "Cannot leave this field empty";
    const skuExists = "This SKU is already registered in our system.";

    //style validation code
    function feedbackEmptyField(id) {
      $(id).addClass("is-invalid");
      $(`${id}-feedback`).text(emptyField);
    }

    function removeFeedback(id) {
      $(id).removeClass("is-invalid");
      $(`${id}-feedback`).text("");
    }

    // sku validation
    const sku = $("#sku").val();

    if (sku === "") {
      feedbackEmptyField("#sku");
      formIsValid = false;
    } else {
      $.ajax({
        url: "includes/checksku.inc.php",
        type: "POST",
        data: { sku: sku },
        success: function (response) {
          if (response == true) {
            $("#sku").addClass("is-invalid");
            $("#sku-feedback").text(skuExists);
            formIsValid = false;
          } else {
            removeFeedback("#sku");
            formIsValid = true;
          }
        },
      });
    }

    // name validation
    const name = $("#name").val();

    if (name === "") {
      feedbackEmptyField("#name");
      formIsValid = false;
    } else {
      removeFeedback("#name");
      formIsValid = true;
    }
  });
});
