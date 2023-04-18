<?php
  include "includes/header.inc.php";      
?>

<form method="post" id="product_form" onkeydown="return event.key != 'Enter';" novalidate>

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
        <input type="text" class="form-control form-default-input" placeholder="type sku" id="sku">
        <span id="sku-feedback"></span>
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Product Name</h5>
        <input type="text" class="form-control form-default-input" placeholder="type name" id="name">
        <span id="name-feedback"></span>
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Price ($)</h5>
        <input type="number" class="form-control form-default-input" placeholder="define price" id="price">
        <span id="price-feedback"></span>
      </div>
      <div class="col-12 form-row">
        <h5 class="form-label">Type Switcher</h5>
        <select name="productType" id="productType" class="form-default-input form-select">
          <option value="" disabled selected>Select a product type</option>
          <option value="classes\model\Dvd" id="DVD">DVD</option>
          <option value="classes\model\Book" id="Furniture">Book</option>
          <option value="classes\model\Furniture" id="Book">Furniture</option>
        </select>
        <span id="productType-feedback"></span>
      </div>
    </div>
  </div>

</form>

<script src="scripts/formselect.script.js"></script>
<script src="scripts/formvalidation.script.js"></script>

<?php
  include "includes/footer.inc.php";     
?>



