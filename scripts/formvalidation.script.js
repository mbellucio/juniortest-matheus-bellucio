$(document).ready(function () {
  $("#product_form").on("submit", function (event) {
    event.preventDefault();

    let formIsValid = true;

    //=========== Input Values ==========//
    const name = $("#name").val();
    const sku = $("#sku").val();
    let price = $("#price").val();
    let productType = $("#productType").val();
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

    //style validation function
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

    // numeric values validation function
    function validateNumeric(value, id) {
      if (value === "") {
        feedback(id, emptyField);
        formIsValid = false;
      } else if (!$.isNumeric(value)) {
        feedback(id, priceFormat);
        formIsValid = false;
      } else {
        value = Number(value);
        removeFeedback(id);
      }
    }

    // price validation
    validateNumeric(price, "#price");

    //select validation
    if (productType === null) {
      feedback("#productType", optionNotSelected);
      formIsValid = false;
    } else {
      switch (productType) {
        case "DvdView":
          size = $("#size").val();
          validateNumeric(size, "#size");
          productType = "DvdController";
          properties.push(size);
          break;

        case "BookView":
          weight = $("#weight").val();
          validateNumeric(weight, "#weight");
          productType = "BookController";
          properties.push(weight);
          break;

        case "FurnitureView":
          height = $("#height").val();
          width = $("#width").val();
          length = $("#length").val();
          const furnProps = [height, width, length];
          const furnPropsIds = ["#height", "#width", "#length"];
          furnProps.forEach(function (property, index) {
            const propertyId = furnPropsIds[index];
            validateNumeric(property, propertyId);
            properties.push(property);
          });
          productType = "FurnitureController";
          break;
      }
      removeFeedback("#productType");
    }
    const paramsString = JSON.stringify(properties);
    if (formIsValid) {
      $.ajax({
        url: "includes/submitform.inc.php",
        type: "POST",
        data: {
          sku: sku,
          name: name,
          price: price,
          properties: paramsString,
          productType: productType,
        },
        success: function () {
          window.location.href = "index.php";
        },
      });
    }
  });
});
