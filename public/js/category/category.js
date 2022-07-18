$(document).ready(function () {

    //Busca Dados da Categoria
    var parametros = {
        data: {
            acao: "list",
        },
    }

    $.ajax({
        url: SITE + 'App/Controller/CategoryController.php',
        type: 'POST',
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);

            // success: function (retorno) {
            data = toJson(retorno);

            if (data.statusCode == 200) {

                var linha = '';

                // Cabeçalho da tabela
                linha += '<table class="data-grid">\n';
                linha += '  <tr class="data-row">\n';
                linha += '    <th class="data-grid-th">\n';
                linha += '      <span class="data-grid-cell-content">Name</span>\n';
                linha += '    </th>\n';
                linha += '    <th class="data-grid-th">\n';
                linha += '      <span class="data-grid-cell-content">Code</span>\n';
                linha += '    </th>\n';
                linha += '    <th class="data-grid-th">\n';
                linha += '      <span class="data-grid-cell-content">Actions</span>\n';
                linha += '    </th>\n';
                linha += `  </tr>\n`;


                // Corpo da tabela
                $.each(data.dados, function (i, item) {
                    linha += `  <tr class="data-row">\n`;
                    linha += `    <td class="data-grid-td" hidden>\n`;
                    linha += `        <span class="data-grid-cell-content">${item.IdCategory}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `      <span class="data-grid-cell-content">${item.name}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `      <span class="data-grid-cell-content">${item.code}</span>\n`;
                    linha += `    </td>\n`;
                    linha += `    <td class="data-grid-td">\n`;
                    linha += `      <div class="actions">\n`;
                    linha += `          <div class="action"><a href="#" class="edit-category" id="${item.id_category}"><i class="fa fa-pencil fa-2x"></i></a></div>\n`;
                    linha += `          <div class="action"><a href="#" class="delete-category" id="${item.id}"><i class="fa fa-trash fa-2x"></i></a></div>\n`;
                    linha += `      </div>\n`;
                    linha += `    </td>\n`;
                    linha += `  </tr>\n`;
                });

                linha += '</table>\n';

                $(".category-table").html(linha);
            } else {
                alert(data.statusCode + ' - ' + data.mensagem)
            }
        }
    });
});

//Delete category
$(document).on(`click`, `.delete-category`, function () {

    // Confirmar a exclusão
    // $("#modalDelete").modal({ backdrop: false });

    // Obtem o código da categoria para a exclusão
    var selectedRow = $(this).closest("tr");
    var id_category = selectedRow.find("span:eq(0)").html();

    var parametros = {
        data: {
            acao: "delete",
            id_category: id_category
        }
    }

    $.ajax({
        url: SITE + `App/Controller/categoryController.php`,
        type: `POST`,
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);
            code = JSON.stringify(data.statusCode);

            if (data.statusCode != 200) {
                alert(`Erro - ` + data.mensagem)
            }

            location.href = "categories.html.php";
        }
    });
});

$(document).on(`click`, `.add-category`, function () {
    $(`#name`).val(''),
    $(`#code`).val(''),

    $("#modalCategory").modal({ backdrop: false });
});

$(document).on(`click`, `.edit-category`, function () {

    var selectedRow = $(this).closest("tr");
    $(`#id_category`).val(selectedRow.find("span:eq(0)").html()),
    $(`#name`).val(selectedRow.find("span:eq(1)").html()),
    $(`#code`).val(selectedRow.find("span:eq(2)").html()),

    $("#modalCategory").modal({ backdrop: false });

});

$('.btn-save-category').click(function (e) {

    //Insere uma nova categoria
    var parametros = {
        data: {
            acao: $('#id_category').val() == '' ? "insert" : "update",
            id_category: $('#id_category').val(),
            name: $('#name').val(),
            code: $('#code').val()
        }
    }

    $.ajax({
        url: SITE + 'App/Controller/CategoryController.php',
        type: 'POST',
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);
            code = JSON.stringify(data.statusCode);

            if (data.statusCode != 200) {
                alert('Erro - ' + data.mensagem)
                return false
            }

            location.href = "categories.html.php";

        }
    });

});