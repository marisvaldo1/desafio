<!DOCTYPE html>

<!-- Head -->

<head>
    <title>Webjump | Backend Test | Dashboard</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" media="all" href="<?= SITE ?>App/View/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
    <meta name="viewport" content="width=device-width,minimum-scale=1">

    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>

    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
</head>
<!-- Head -->

<!-- SideBar -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
    <div class="close-menu">
        <a on="tap:sidebar.toggle">
            <img src="<?= SITE ?>App/View/images/bt-close.png" alt="Close Menu" width="24" height="24" />
        </a>
    </div>
    <a href="<?= SITE ?>App/View/dashboard.html.php"><img src="<?= SITE ?>App/View/images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
    <div>
        <ul>
            <li><a href="<?= SITE ?>App/View/modules/Categories/categories.html.php" class="link-menu">Categories</a></li>
            <li><a href="<?= SITE ?>App/View/modules/Products/products.html.php" class="link-menu">Products</a></li>
        </ul>
    </div>
</amp-sidebar>
<!-- SideBar -->

<!-- Header -->
<header>
    <div class="go-menu">
        <a on="tap:sidebar.toggle">☰</a>
        <a href="<?= SITE ?>App/View/dashboard.html.php" class="link-logo"><img src="<?= SITE ?>App/View/images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
    </div>
    <div class="right-box">
        <span class="go-title">Administration Panel</span>
    </div>
</header>
<!-- Header -->

<!-- Modal Delete-->
<div class="modal fade" id="modalDelete" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-pencil"></span> Excluir Registro</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="ame"> Confirme a exclusão do registro</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-default pull-rigth" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Não</button>
                    <button type="button" class="btn btn-danger btn-default pull-rigth btn-save-category"><span class="glyphicon glyphicon-off"></span> Sim</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<!-- Modal -->

<!-- Font Awesome CSS -->
<link href="<?= SITE ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<!-- Funções globais -->
<script src="<?= SITE ?>public/js/global.js"></script>

<script>
    var SITE = '<?= SITE ?>';
    var RAIZ = '<?= RAIZ ?>';
</script>