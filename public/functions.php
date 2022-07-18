<?php

function autoload($classe) {
    if (strpos($classe, 'Model') !== false ||
            strpos($classe, 'App') !== false) {
        $arquivo = RAIZ . $classe . '.php';
        $arquivo = str_replace(['\\'], DIRECTORY_SEPARATOR, $arquivo);
        if (file_exists($arquivo)) {
            include $arquivo;
            return;
        }
    } else {
        $arquivo = RAIZ . str_replace(['\\'], DIRECTORY_SEPARATOR, '/' . $classe) . '.php';
        if (file_exists($arquivo)) {
            include $arquivo;
            return;
        }
    }
}

/** Abreviatura para bd\MySQL::conexao();
 *
 * @return db\MySQL;
 */

function conexao($data_source = null)
{
    return App\db\MySQL::conexao($data_source);
}

/* * Abreviatura de header('Location: url');
* 
* @param type $url
*/
function location($url)
{
    header('Location: ' . $url);
    exit;
}
?>