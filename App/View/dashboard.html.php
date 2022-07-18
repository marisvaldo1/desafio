<?php
include '../../inicia.php';
include RAIZ . 'App/View/head.php';
?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Dashboard</h1>
    <a href="<?= SITE ?>App/View/modules/Products/addProduct.html.php" class="btn-action addProduct">Add new Product</a>
  </div>
  <div class="infor">
    <span class="quantity"></span>
  </div>

  <ul class="product-list"></ul>
  
</main>
<!-- Main Content -->

<!-- Footer -->
<?php
include RAIZ . 'App/View/footer.php';
?>
<!-- Footer -->

<!-- Script da página -->
<script src="<?= SITE ?>public/js/product/productsDashboard.js"></script>
<!-- Script -->