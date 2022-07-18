$('#image').change(function (e) {
    if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };
        file.readAsDataURL(this.files[0]);
    }
})

$(document).on('click', '.save-product', function () {
    //Altera ou insere produtos
    var parametros = {
        data: {
            acao: "insert",
            sku: $('#sku').val(),
            name: $('#name').val(),
            price: $('#price').val(),
            quantity: $('#quantity').val(),
            description: $('#description').val(),
            image: $('#image').val(''),
        },
    }

    $.ajax({
        url: SITE + `App/Controller/ProductController.php`,
        type: `POST`,
        data: parametros,
        success: function (retorno) {
           data = toJson(retorno);
            code = JSON.stringify(data.statusCode);

            if (data.statusCode != 200) {
                alert('Erro - ' + data.mensagem)
                return false
            }
            $("#form-data").submit();
        }
    });
});

// // $(document).on(`click`, `.save-product`, function () {
// //     //Insere novo produto as informações do novo
// //     var parametros = {
// //         data: {
// //             acao: "update",
// //             sku: $(`#sku`).val(),
// //             name: $(`#name`).val(),
// //             price: $(`#price`).val(),
// //             quantity: $(`#quantity`).val(),
// //             description: $(`#description`).val(),
// //             image: $(`#image`).val('')
// //         }
// //     }    

// //     $.ajax({
// //         url: SITE + 'App/Controller/ProductController.php',
// //         type: 'POST',
// //         data: parametros,
// //         success: function (retorno) {
// //             data = toJson(retorno);
// //             code = JSON.stringify(data.statusCode);

// //             if(data.statusCode != 200) {
// //                 alert('Erro - ' + data.mensagem)
// //                 return false
// //             }
// //         }
// //     });
    
// });