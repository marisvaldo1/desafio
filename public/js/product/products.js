$(document).ready(function () {

    //Busca Dados do Produto
    var parametros = {
        data: {
            acao: "list",
        },
    }

    $.ajax({
        url: SITE + `App/Controller/ProductController.php`,
        type: `GET`,
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);

            // success: function (retorno) {
            data = toJson(retorno);

            if (data.statusCode == 200) {

                var linha = ``;

                linha += `<table class="data-grid">\n`;
                linha += `  <tr class="data-row">\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">Name</span>\n`;
                linha += `      </th>\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">SKU</span>\n`;
                linha += `      </th>\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">Price</span>\n`;
                linha += `      </th>\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">Quantity</span>\n`;
                linha += `      </th>\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">Categories</span>\n`;
                linha += `      </th>\n`;
                linha += `      <th class="data-grid-th">\n`;
                linha += `          <span class="data-grid-cell-content">Actions</span>\n`;
                linha += `      </th>\n`;
                linha += `  </tr>\n`;

                $.each(data.dados, function (i, item) {
                    linha += `<tr class="data-row">\n`;
                    linha += `    <td class="data-grid-td" hidden>\n`;
                    linha += `        <span class="data-grid-cell-content">${item.IdProduct}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `        <span class="data-grid-cell-content">${item.name}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `        <span class="data-grid-cell-content">${item.SKU}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `        <span class="data-grid-cell-content">${item.price}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `        <span class="data-grid-cell-content">${item.quantity}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `        <span class="data-grid-cell-content">${item.id_category}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td" hidden>\n`;
                    linha += `        <span class="data-grid-cell-content">${item.description}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `       <div class="actions">\n`;
                    linha += `          <div class="action"><a href="#" class="edit-product" id="${item.IdProduct}"><i class="fa fa-pencil fa-2x"></i></a></div>\n`;
                    linha += `          <div class="action"><a href="#" class="delete-product" id="${item.IdProduct}"><i class="fa fa-trash fa-2x"></i></a></div>\n`;
                    linha += `       </div>\n`;
                    linha += `    </td>\n`;
                });

                linha += `</table>\n`;

                $(".product-table").html(linha);
            }
            else {
                //alert(data.statusCode + ` - ` + data.mensagem)
            }
        }
    });
});

//Delete product
$(document).on(`click`, `.delete-product`, function () {

    // Confirmar a exclusão
    // $("#modalDelete").modal({ backdrop: false });
    // return false

    // Obtem o código do produto para a exclusão
    var selectedRow = $(this).closest("tr");
    var id_product = selectedRow.find("span:eq(0)").html();

    var parametros = {
        data: {
            acao: "delete",
            id_product: id_product
        }
    }

    $.ajax({
        url: SITE + `App/Controller/ProductController.php`,
        type: `POST`,
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);
            code = JSON.stringify(data.statusCode);

            if (data.statusCode != 200) {
                alert(`Erro - ` + data.mensagem)
                return false
            }

            location.href = "products.html.php";
        }
    });
});

$(document).on(`click`, `.add-product`, function () {
    $(`#sku`).val(''),
    $(`#name`).val(''),
    $(`#price`).val(''),
    $(`#quantity`).val(''),
    $(`#description`).val('')
    
    $("#modalProduct").modal({ backdrop: false });
});

$(`#image`).change(function (e) {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function (e) {
            document.getElementById("preview").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
})

//Edita o produto
$(document).on(`click`, `.edit-product`, function () {

    // Salva dados na storage para alteração
    var selectedRow = $(this).closest("tr");
    $(`#id_product`).val(selectedRow.find("span:eq(0)").html())
    $(`#sku`).val(selectedRow.find("span:eq(1)").html())    
    $(`#name`).val(selectedRow.find("span:eq(2)").html())    
    $(`#price`).val(selectedRow.find("span:eq(3)").html())  
    $(`#quantity`).val(selectedRow.find("span:eq(4)").html())
    $(`#id_category`).val(selectedRow.find("span:eq(5)").html())
    $(`#description`).val(selectedRow.find("span:eq(6)").html())
    $("#modalProduct").modal({ backdrop: false });

});

$('.btn-save-product').click(function (e) {

    //Insere uma nova categoria
    var parametros = {
        data: {
            acao: $('#id_product').val() == '' ? "insert" : "update",
            id_product: $('#id_product').val(),
            sku: $('#sku').val(),
            name: $('#name').val(),
            price: $('#price').val(),
            quantity: $('#quantity').val(),
            description: $('#description').val(),
            image: $('#image').val(),
        }
    }

    $.ajax({
        url: SITE + 'App/Controller/ProductController.php',
        type: 'POST',
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);
            code = JSON.stringify(data.statusCode);

            if (data.statusCode != 200) {
                alert('Erro - ' + data.mensagem)
                return false
            }

            location.href = "products.html.php";

        }
    });

});