<?php
  include "includes/header.inc.php";     
?>

<?php
  $view = new ProductView(); 
  $query = $view->showAllProducts(); 
?>

<form method="post" id="delete-form">
  <div class="container">
    <div class="row align-items-end">
        <div class="col">
          <h2 class="page-title">Product List</h2>
        </div>
        <div class="col btn-box text-end">
          <a type="button" class="menu-buttons btn btn-dark" href="addproduct.php">ADD</a>
          <button type="submit" class="menu-buttons btn btn-dark">MASS DELETE</button>
        </div>
    </div>
  </div>

  <div class="rule-box">
    <hr class="rule">
  </div>

  <div class="container">
    <div class="row">
      <?php foreach ($query as $product): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card product-card">
            <div class="container checkbox-container">
              <input type="checkbox" name="skus[]" class="delete-checkbox" value="<?php echo $product['products_sku'] ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title product-property"><?= $product['products_sku'] ?></h5>
              <p class="card-text product-property"><?= $product['products_name'] ?></p>
              <p class="card-text product-property"><?= $product['products_price']?> $</p>
              <p class="card-text product-property"><?= $product['products_attribute']?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</form>

<script src="scripts/massdelete.script.js"></script>

<?php
  include "includes/footer.inc.php";     
?>


