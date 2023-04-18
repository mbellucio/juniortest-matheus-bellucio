$(document).ready(function () {
  $("#product_form").on("submit", function (event) {
    event.preventDefault();

    let formIsValid = true;

    //=========== Input Values ==========//
    const name = $("#name").val();
    const sku = $("#sku").val();
    let price = $("#price").val();
    const productType = $("#productType").val();
    const properties = [];
    let weight;
    let size;
    let height;
    let width;
    let length;
    //=========== //////////// ==========//

    //feedback messages
    const emptyField = "Cannot leave this field empty";
    const skuExists = "This SKU already exists";
    const priceFormat = "this field must be a number e.g. 1, 1.5, 2.5 ...";
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
        async: false,
        data: { sku: sku },
        success: function (response) {
          if (response == true) {
            feedback("#sku", skuExists);
            formIsValid = false;
          } else {
            removeFeedback("#sku");
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
    }

    //select validation
    if (productType === null) {
      feedback("#productType", optionNotSelected);
      formIsValid = false;
    } else {
      switch (productType) {
        case "DvdView":
          size = $("#size").val();
          if (size === "") {
            feedback("#size", emptyField);
            formIsValid = false;
          } else if (!$.isNumeric(size)) {
            feedback("#size", priceFormat);
            formIsValid = false;
          } else {
            size = parseFloat(size).toFixed(2);
            removeFeedback("#size");
          }
          break;

        case "BookView":
          weight = $("#weight").val();
          if (weight === "") {
            feedback("#weight", emptyField);
            formIsValid = false;
          } else if (!$.isNumeric(weight)) {
            feedback("#weight", priceFormat);
            formIsValid = false;
          } else {
            weight = parseFloat(weight).toFixed(2);
            removeFeedback("#weight");
          }
          break;

        case "FurnitureView":
          height = $("#height").val();
          width = $("#width").val();
          length = $("#length").val();
          const furnProps = [height, width, length];
          const furnPropsIds = ["#height", "#width", "#length"];
          furnProps.forEach(function (property, index) {
            const propertyId = furnPropsIds[index];
            if (property === "") {
              feedback(propertyId, emptyField);
              formIsValid = false;
            } else if (!$.isNumeric(property)) {
              feedback(propertyId, priceFormat);
              formIsValid = false;
            } else {
              property = parseFloat(property).toFixed(2);
              removeFeedback(propertyId);
            }
          });
          break;
      }
      removeFeedback("#productType");
    }
    console.log(formIsValid);
  });
});
