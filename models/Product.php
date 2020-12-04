<?php

class Product{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
    private $image;
    private $db;

    /*  mysqli_real_escape_string,  scape, no lo interpreta como parte del lenguaje, se enfoca en el INSERT "''"
        Lo que entré sera como string, esto evitando usar las comillas simples o dobles y que la bd devuelva un error
        Implementado el scape ya se podra ingresar comillas simples y dobles
    */

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getCategoryId(){
        return $this->category_id;
    }
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $this->db->real_escape_string($description);
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $this->db->real_escape_string($price);
    }
    public function getStock(){
        return $this->stock;
    }
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    public function getOffer(){
        return $this->offer;
    }
    public function setOffer($offer){
        $this->offer = $this->db->real_escape_string($offer);
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function getAll(){

        $sql = "SELECT * FROM products ORDER BY id DESC";
        $products = $this->db->query($sql);

        return $products;
    }
    public function getProduct(){

        $product =$this->db->query("SELECT * FROM products WHERE id = {$this->getId()}");

        return $product->fetch_object();
    }
    public function getProductRandom($limit){
        $products = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");

        return $products;
    }
    // Se le asigno un alias a c.name, ya que name es comun en ambas tablas(products, categories) y en futuro puede fallar la consulta
    public function getProductCategory(){
        $sql = "SELECT p.*, c.name AS 'categoryname' FROM products p
                    INNER JOIN categories c ON c.id = p.category_id
                        WHERE p.category_id = {$this->getCategoryId()}
                            ORDER BY id DESC";

        $products = $this->db->query($sql);

        return $products;
    }
    public function save(){

        $sql = "INSERT INTO products
                    VALUES(NULL, {$this->getCategoryId()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImage()}' );";

        $save = $this->db->query($sql);
        /*
        echo $sql;
        echo "<br>";
        echo $this->db->error;
        die();*/

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE products
                    SET name = '{$this->getName()}', description = '{$this->getDescription()}', price = {$this->getPrice()}, stock = {$this->getStock()}, category_id = {$this->getCategoryId()} ";

        if($this->getImage() != null){
            $sql .= ", image = '{$this->getImage()}'";
        }

        $sql .= " WHERE id = {$this->id};";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM products WHERE id = {$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }
}



?>