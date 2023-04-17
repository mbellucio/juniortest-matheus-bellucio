$(document).ready(function() {
  $('#productType').on('change', function() {
    const productType = $(this).val();
  
    $.ajax({
      url: 'includes/typeformgen.inc.php',
      type: 'POST',
      data: {
        productType: productType
      },
      success: function(response) {
        $('.additional-form').remove();
        $('.guidance-msg').remove(); 
        $('#form-box').append(response);
      },
    });
  });
});