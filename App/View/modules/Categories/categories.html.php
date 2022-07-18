<?php
include '../../../../inicia.php';
include RAIZ . 'App/View/head.php';
?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Categories</h1>
    <a href="#" class="btn-action add-category">Add new Category</a>
  </div>

  <div class="category-table"></div>

  <!-- Modal -->
  <div class="modal fade" id="modalCategory" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-pencil"></span> Change Category</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="ame"> Category Name</label>
              <input type="hidden" class="form-control" id="id_category">
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="code"> Category Code</label>
              <input type="text" class="form-control" id="code">
            </div>
            <button type="submit" class="btn btn-default btn-default pull-rigth" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Back</button>
            <button type="button" class="btn btn-success btn-default pull-rigth btn-save-category"><span class="glyphicon glyphicon-off"></span> Save</button>
          </form>
        </div>
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
<script src="<?= SITE ?>public/js/category/category.js"></script>
<!-- Script -->