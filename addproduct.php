<?php
  include "includes/header.inc.php";   
  error_reporting(E_ALL);
  ini_set('display_errors', 1);   
?>

<form action="addproduct.inc.php" method="post" id="product_form" onkeydown="return event.key != 'Enter';">

  <div class="container">
    <div class="row align-items-end">
        <div class="col">
          <h2 class="page-title">Product Add</h2>
        </div>
        <div class="col btn-box text-end">
          <button type="submit" class="menu-buttons btn btn-dark">Save</button>
          <a type="button" class="menu-buttons btn btn-dark" onclick="href='index.php'">Cancel</a>
        </div>
    </div>
  </div>

  <div class="rule-box">
    <hr class="rule">
  </div>

  <div class="container">
    <div class="row" id="form-box">
      <div class="col-12 form-row">
        <h5 class="form-label">Product SKU</h5>
        <input type="text" class="form-control form-default-input" placeholder="type sku" aria-label="SKU" id="sku">
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Product Name</h5>
        <input type="text" class="form-control form-default-input" placeholder="type name" aria-label="NAME" id="name">
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Price ($)</h5>
        <input type="text" class="form-control form-default-input" placeholder="define price" aria-label="NAME" id="price">
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Type Switcher</h5>
        <select name="productType" id="productType" class="form-default-input form-select">
          <option value="" disabled selected>Select a product type</option>
          <option value="DvdView" id="DVD" >DVD</option>
          <option value="BookView" id="Furniture" >Book</option>
          <option value="FurnitureView" id="Book">Furniture</option>
        </select>
      </div>
    </div>
  </div>

</form>

<script>
  const form = document.getElementById('form-box');
  const select = document.getElementById('productType');

  select.addEventListener('change', function() {
    console.log('working EL')
    const productType = select.value;
    console.log(productType)
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/typeformgen.inc.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
      // Add the generated HTML code to the form
      form.insertAdjacentHTML('beforeend', xhr.responseText);
    }
  };
  xhr.send(`productType=${productType}`);
});
</script>

<?php
  include "includes/footer.inc.php";     
?>

