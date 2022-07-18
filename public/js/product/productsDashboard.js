$(document).ready(function () {

    //Busca Dados do Produto
    var parametros = {
        data: {
            acao: "list",
        },
    }

    $.ajax({
        url: SITE + 'App/Controller/ProductController.php',
        type: 'POST',
        data: parametros,
        success: function (retorno) {
            data = toJson(retorno);

            // success: function (retorno) {
            data = toJson(retorno);

            if (data.statusCode == 200) {

                listProducts = '\n';

                var linha = '<ul class="product-list">\n';
                var images = 
                    [
                        SITE + 'App/View/images/product/tenis-runner-bolt.png',
                        SITE + 'App/View/images/product/tenis-basket-light.png',
                        SITE + 'App/View/images/product/tenis-2d-shoes.png',
                        SITE + 'App/View/images/product/tenis-sneakers-43n.png',
                    ];

                $.each(data.dados, function (i, item) {
                    linha += '  <li>\n';
                    linha += '    <div class="product-image">\n';
                    linha += '      <a href="tenis-basket-light.html" title="' + item.name + '">\n';
                    linha += '          <img src="' + images[i] + '" layout="responsive" width="164" height="145" alt="' + item.name + '" />\n';
                    linha += '      </a>\n';
                    linha += '    </div>\n';
                    linha += '    <div class="product-info">\n';
                    linha += '        <div class="product-name">\n';
                    linha += '            <span>' + item.name + '</span>\n';
                    linha += '        </div>\n';
                    linha += '        <div class="product-price">\n';
                    linha += '            <span class="special-price">' + item.quantity + ' available</span>\n';
                    linha += '            <span>R$ ' + item.price + '</span>\n';
                    linha += '        </div>\n';
                    linha += '    </div>\n';
                    linha += '  </li>\n'
                });
                
                linha += '</ul>\n\n';

                $(".product-list").html(linha);
                $(".quantity").html('You have ' + data.dados.length + ' added on this store:');
            } else {
                $(".quantity").html("you don't have any products registered on the store");
            }

        }
    });
});