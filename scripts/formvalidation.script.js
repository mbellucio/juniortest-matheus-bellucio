$(document).ready(function () {
  $("#product_form").on("submit", function (event) {
    event.preventDefault();

    var sku = $("#product_form").val();

    $.ajax({
      url: "includes/checksku.inc.php",
      type: "POST",
      data: { sku: sku },
      success: function (response) {
        if (response) {
          console.log("sku already exists in the database");
        }
      },
    });
  });
});
