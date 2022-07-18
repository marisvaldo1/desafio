<?php
include '../../../../inicia.php';
include RAIZ . 'App/View/head.php';
?>

<!-- Main Content -->
<main class="content">
  <h1 class="title new-item" action="">New Product</h1>
  <form id="form-data" action="products.html.php">
    <form>
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" class="input-text" />
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" class="input-text" />
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" class="input-text" />
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" class="input-text" />
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" class="input-text">
          <option>Category 1</option>
          <option>Category 2</option>
          <option>Category 3</option>
          <option>Category 4</option>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" class="input-text"></textarea>
      </div>
      <div class="input-field">
        <label for="image" class="label">Image</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
        <input name="image" ID="image" type="file" />
      </div>
      <div class="input-field">
        <label for="image" class="label">Image Selected</label>
        <img id="preview" src="">
      </div>
      <div class="actions-form">
        <a href="products.html.php" class="action back">Back</a>
        <input class="btn-submit btn-action save-product" type="button" value="Save Product" />
        <!-- <input class="btn-submit btn-action save-product" type="submit" value="Save Product" /> -->
      </div>

      <!-- <div class="action"><a href="#" class="save-product"><i class="fa fa-pencil fa-2x"></i></a></div>; -->

    </form>
</main>
<!-- Main Content -->

<!-- Footer -->
<?php
include RAIZ . 'App/View/footer.php';
?>
<!-- Footer -->

<!-- Script da página -->
<script src="<?= SITE ?>public/js/product/addProduct.js"></script>
<!-- Script -->