<?php
include '../../inicia.php';
include RAIZ . 'App/View/head.php';
?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Dashboard</h1>
    <!-- <a href="<?= SITE ?>App/View/modules/Products/addProduct.html.php" class="btn-action addProduct">Add new Product</a> -->
    <a href="#" class="btn-action add-product">Add new Product</a>
  </div>
  <div class="infor">
    <span class="quantity"></span>
  </div>

  <ul class="product-list"></ul>

  <!-- Modal -->
  <div class="modal fade" id="modalProduct" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-pencil"></span> Change Product</h4>
        </div>

        <div class="modal-body">
          <div class="card mb-8">
            <div class="card-body">
              <div class="form-row">
                <label for="sku"> Product SKU</label>
                <input type="hidden" class="form-control" id="id_product">
                <input type="text" class="form-control" id="sku">
              </div>
              <div class="form-group">
                <label for="code"> Pruct Name</label>
                <input type="text" class="form-control" id="name">
              </div>

              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price">
                </div>
                <div class="form-group col-md-4">
                  <label for="quantity">Quantity</label>
                  <input type="text" class="form-control" id="quantity">
                </div>
              </div>

              <div class="form-group">
                <label for="category"> Category</label>
                <select multiple id="category" class="input-text">
                  <option>Category 1</option>
                  <option>Category 2</option>
                  <option>Category 3</option>
                  <option>Category 4</option>
                </select>
              </div>

              <div class="form-group">
                <label for="Description">Description</label>
                <textarea id="description" class="input-text"></textarea>
              </div>

              <div class="form-group">
                <label for="Description">Image</label>
                <label for="image" class="label">Image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
                <input name="image" ID="image" type="file" />
              </div>

              <div class="form-group">
                <label for="image" class="label">Image Selected</label>
                <img id="preview" src="">
              </div>
              <form role="form">
                <button type="submit" class="btn btn-default btn-default pull-rigth" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Back</button>
                <button type="button" class="btn btn-success btn-default pull-rigth btn-save-product"><span class="glyphicon glyphicon-off"></span> Save</button>
              </form>
            </div>
          </div>
        </div>

        <div class="modal-body" style="padding:40px 50px;">
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->

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