$(document).ready(function () {
  $("#product_form").on("submit", function (event) {
    event.preventDefault();

    let formIsValid = true;

    //=========== Input Values ==========//
    const name = $("#name").val();
    const sku = $("#sku").val();
    let price = $("#price").val();
    const productType = $("#productType").val();
    //=========== //////////// ==========//

    //feedback messages
    const emptyField = "Cannot leave this field empty";
    const skuExists = "This SKU is already exists";
    const priceFormat = "Price must be a number e.g. 1, 1.5, 2.5 ...";
    const optionNotSelected = "You must select an option";

    //style validation code
    function feedback(id, text) {
      $(id).addClass("is-invalid");
      $(`${id}-feedback`).text(text);
    }

    function removeFeedback(id) {
      $(id).removeClass("is-invalid");
      $(`${id}-feedback`).text("");
    }

    // sku validation
    if (sku === "") {
      feedback("#sku", emptyField);
      formIsValid = false;
    } else {
      $.ajax({
        url: "includes/checksku.inc.php",
        type: "POST",
        data: { sku: sku },
        success: function (response) {
          if (response == true) {
            feedback("#sku", skuExists);
            formIsValid = false;
          } else {
            removeFeedback("#sku");
            formIsValid = true;
          }
        },
      });
    }

    // name validation
    if (name === "") {
      feedback("#name", emptyField);
      formIsValid = false;
    } else {
      removeFeedback("#name");
      formIsValid = true;
    }

    // price validation
    if (price === "") {
      feedback("#price", emptyField);
      formIsValid = false;
    } else if (!$.isNumeric(price)) {
      feedback("#price", priceFormat);
      formIsValid = false;
    } else {
      price = parseFloat(price).toFixed(2);
      removeFeedback("#price");
      formIsValid = true;
    }

    // console.log(productType);
    // select validation
    // if (productType === null) {
    //   feedback("#productType", optionNotSelected);
    //   formIsValid = false;
    // } else {

    // }
  });
});
