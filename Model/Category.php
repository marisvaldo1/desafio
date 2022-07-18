<?php

namespace Model;

use App\db\MySQL;

class Category
{
    public $IdCategory;
    public $name;
    public $code;

    /*
    * Retorna todos os categorias cadastrados
    */
    public static function listCategory($dados = null)
    {

        $categories = new \stdClass();

        try {
            $conexao = MySQL::conexao();

            $sql = 'SELECT id_category, name, code
                    FROM categories';

            $category = new \stdClass();
            $categories = new \stdClass();
            $categories->statusCode = 200;
            $categories->dados = [];

            try {
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows) {
                    while ($row = $conexao->fetch($resultado)) {
                        $category = new Category();
                        $category->setIdCategory($row['id_category']);
                        $category->setName($row['name']);
                        $category->setCode($row['code']);
                        $categories->dados[] = $category;
                    }
                } else {
                    $categories->statusCode = 404;
                    $categories->mensagem = 'Nenhum categoria cadastrada.';
                }
            } catch (\Exception $e) {
                $categories->statusCode = 400;
                $categories->mensagem = $e->getMessage();
            }

            // Erro na conexão com o banco de dados            
        } catch (\Exception $e) {
            $categories->statusCode = 400;
            $categories->mensagem = $e->getMessage();
        }

        return $categories;
    }
    /*
    * Insere uma nova categoria
    */
    public static function newCategory($dados = null)
    {

        $categories = new \stdClass();

        try {
            $conexao = MySQL::conexao();

            $sql = 'INSERT INTO category, name, code
                    FROM categories';

            $categoriy = new \stdClass();
            $categories = new \stdClass();
            $categories->statusCode = 200;
            $categories->dados = [];

            try {
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows) {
                    while ($row = $conexao->fetch($resultado)) {
                        $category = new Category();
                        $category->setIdCategory($row['id_category']);
                        $category->setName($row['name']);
                        $category->setCode($row['code']);
                        $categories->dados[] = $category;
                    }
                } else {
                    $categories->statusCode = 404;
                    $categories->mensagem = 'Nenhuma categoria cadastrado.';
                }
            } catch (\Exception $e) {
                $categories->statusCode = 400;
                $categories->mensagem = $e->getMessage();
            }

            // Erro na conexão com o banco de dados            
        } catch (\Exception $e) {
            $categories->statusCode = 400;
            $categories->mensagem = $e->getMessage();
        }

        return $categories;
    }

    // Insere ou altera os dados da categoria
    public static function saveCategory($dados)
    {
        $conexao = MySQL::conexao();

        $dados = $dados['data'];
        $categories = new \stdClass();
        $categories->statusCode = 200;

        if ($dados['acao'] == 'update') {
            $sql = 'UPDATE categories SET '
                . ' name = "' . $dados['name'] . '", '
                . ' code = "' . $dados['code'] . '"'
                . ' WHERE id_category = ' . $dados['id_category'];
        } elseif ($dados['acao'] == 'insert') {

            $sql = 'INSERT INTO categories ('
                . 'name, '
                . 'code ) '
                . ' VALUES ( '
                . '"' . $dados['name'] . '",'
                . '"' . $dados['code'] . '") ';
        }

        try {
            $r = $conexao->query($sql);
            $categories = new \stdClass();
            $categories->statusCode = 200;

            if ($dados['acao'] == 'save')
                $categories->mensagem = 'Alteração efetuada com sucesso';
            elseif ($dados['acao'] == 'insert')
                $categories->mensagem = 'Inclusão efetuada com sucesso';
        } catch (\Exception $e) {
            $categories->statusCode = 400;
            $categories->mensagem = $e->getMessage();
        }

        return $categories;
    }

    // Delete category
    public static function deleteCategory($dados)
    {
        $conexao = MySQL::conexao();

        $dados = $dados['data'];
        $categories = new \stdClass();
        $categories->statusCode = 200;

        $sql = 'DELETE FROM categories '
            . ' WHERE id_category = ' . $dados['id_category'];

        try {
            $r = $conexao->query($sql);
            $categories = new \stdClass();
            $categories->statusCode = 200;

            $categories->mensagem = 'Category deleted';
        } catch (\Exception $e) {
            $categories->statusCode = 400;
            $categories->mensagem = $e->getMessage();
        }

        return $categories;
    }

    /**
     * Get the value of IdCategory
     */
    public function getIdCategory()
    {
        return $this->IdCategory;
    }

    /**
     * Set the value of IdCategory
     *
     * @return  self
     */
    public function setIdCategory($IdCategory)
    {
        $this->IdCategory = $IdCategory;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
