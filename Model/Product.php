<?php

namespace Model;

// use App\db\My;
use App\db\MySQL;

class Product
{
    public $IdProduct;
    public $SKU;
    public $name;
    public $price;
    public $quantity;
    public $description;
    public $image;

    /*
    * Retorna todos os produtos cadastrados
    */
    public static function listProduct($dados = null)
    {

        $products = new \stdClass();

        try {
            $conexao = MySQL::conexao();

            $sql = 'SELECT id_product, sku, name, price, description, quantity, image FROM products';

            $product = new \stdClass();
            $products = new \stdClass();
            $products->statusCode = 200;
            $products->dados = [];

            try {
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows) {
                    while ($row = $conexao->fetch($resultado)) {
                        $product = new Product();
                        $product->setIdProduct($row['id_product']);
                        $product->setSKU($row['sku']);
                        $product->setName($row['name']);
                        $product->setPrice($row['price']);
                        $product->setQuantity($row['quantity']);
                        $product->setDescription($row['description']);
                        $product->setImage($row['image']);
                        $products->dados[] = $product;
                    }
                } else {
                    $products->statusCode = 404;
                    $products->mensagem = 'Nenhum produto cadastrado.';
                }
            } catch (\Exception $e) {
                $products->statusCode = 400;
                $products->mensagem = $e->getMessage();
            }

            // Erro na conexão com o banco de dados            
        } catch (\Exception $e) {
            $products->statusCode = 400;
            $products->mensagem = $e->getMessage();
        }

        return $products;
    }
    /*
    * Insere um novo produto
    */
    public static function newProduct($dados = null)
    {

        $products = new \stdClass();

        try {
            $conexao = MySQL::conexao();

            $sql = 'INSERT INTO products, sku, name, price, description, quantity
                    FROM products';

            $product = new \stdClass();
            $products = new \stdClass();
            $products->statusCode = 200;
            $products->dados = [];

            try {
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows) {
                    while ($row = $conexao->fetch($resultado)) {
                        $product = new Product();
                        $product->setIdProduct($row['id_product']);
                        $product->setSKU($row['sku']);
                        $product->setName($row['name']);
                        $product->setPrice($row['price']);
                        $product->setQuantity($row['quantity']);
                        $products->dados[] = $product;
                    }
                } else {
                    $products->statusCode = 404;
                    $products->mensagem = 'Nenhum produto cadastrado.';
                }
            } catch (\Exception $e) {
                $products->statusCode = 400;
                $products->mensagem = $e->getMessage();
            }

            // Erro na conexão com o banco de dados            
        } catch (\Exception $e) {
            $products->statusCode = 400;
            $products->mensagem = $e->getMessage();
        }

        return $products;
    }

    // Insere ou altera os dados do produto
    public static function saveProduct($dados)
    {
        $conexao = MySQL::conexao();

        $dados = $dados['data'];
        $products = new \stdClass();
        $products->statusCode = 200;

        if ($dados['acao'] == 'update') {
            $sql = 'UPDATE products SET '
                . ' sku = "' . $dados['sku'] . '", '
                . ' name = "' . $dados['name'] . '", '
                . ' price = ' . floatval($dados['price']) . ', '
                . ' description = "' . $dados['description'] . '", '
                . ' quantity = ' . $dados['quantity']
                . ' WHERE id_product = ' . $dados['id_product'];
        } elseif ($dados['acao'] == 'insert') {

            $sql = 'INSERT INTO products ('
                . 'sku, '
                . 'name, '
                . 'price, '
                . 'description, '
                . 'quantity, '
                . 'image ) '
                . ' VALUES ( '
                . '"' . $dados['sku'] . '", '
                . '"' . $dados['name'] . '",'
                . floatval($dados['price']) . ', '
                . '"' . $dados['description'] . '",'
                . floatval($dados['quantity']) . ', '
                . '"' . $dados['image'] . '") ';
        }

        try {
            $r = $conexao->query($sql);
            $products = new \stdClass();
            $products->statusCode = 200;
    
            if ($dados['acao'] == 'save')
                $products->mensagem = 'Alteração efetuada com sucesso';
            elseif ($dados['acao'] == 'insert')
                $products->mensagem = 'Inclusão efetuada com sucesso';
    
        } catch (\Exception $e) {
            $products->statusCode = 400;
            $products->mensagem = $e->getMessage();
        }

        return $products;
    }
    // Insere ou altera os dados do produto
    public static function deleteProduct($dados)
    {
        $conexao = MySQL::conexao();

        $dados = $dados['data'];
        $products = new \stdClass();
        $products->statusCode = 200;

        $sql = 'DELETE FROM products '
            . ' WHERE id_product = ' . $dados['id_product']
        ;

        try {
            $r = $conexao->query($sql);
            $products = new \stdClass();
            $products->statusCode = 200;
    
            $products->mensagem = 'Produto excluído';
    
        } catch (\Exception $e) {
            $products->statusCode = 400;
            $products->mensagem = $e->getMessage();
        }

        return $products;
    }

    /**
     * Get the value of IdProduct
     */
    public function getIdProduct()
    {
        return $this->IdProduct;
    }

    /**
     * Set the value of IdProduct
     *
     * @return  self
     */
    public function setIdProduct($IdProduct)
    {
        $this->IdProduct = $IdProduct;

        return $this;
    }

    /**
     * Get the value of SKU
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * Set the value of SKU
     *
     * @return  self
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
