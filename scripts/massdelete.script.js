$(document).ready(function () {
  $("#delete-form").on("submit", function (event) {
    event.preventDefault();
    const checkboxes = $(this).find(".delete-checkbox:checked");

    const skus = [];
    checkboxes.each(function () {
      skus.push($(this).val());
    });

    $.ajax({
      url: "includes/massdelete.inc.php",
      type: "POST",
      data: { skus: skus },
      success: function (response) {
        checkboxes.closest(".col-12").remove();
      },
    });
  });
});
