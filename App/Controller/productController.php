<?php

include '../../inicia.php';

use Model\Product;

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {;
    //Receive the RAW post data.
    $json = file_get_contents('php://input');
    $j = json_decode($json);
    $_REQUEST = (array) $j->parametros;
}

try {
    $acao = $_REQUEST['data']['acao'];

    if ($acao == 'list') {
        $retorno = Product::listProduct();
    }
    elseif ($acao == 'insert' || $acao == 'update') {
        $retorno = Product::saveProduct($_REQUEST);
    }
    elseif ($acao == 'delete') {
        $retorno = Product::deleteProduct($_REQUEST);
    }
} catch (Exception $ex) {
    $retorno = [
        'statusCode' => 500,
        'mensagem' => $ex->getMessage()
    ];
}

echo json_encode($retorno);