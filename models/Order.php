<?php

class Order{
    private $id;
    private $user_id;
    private $state;
    private $city;
    private $adress;
    private $cost;
    private $status;
    private $date;
    private $hour;
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
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function getState(){
        return $this->state;
    }
    public function setState($state){
        $this->state = $this->db->real_escape_string($state);
    }
    public function getCity(){
        return $this->city;
    }
    public function setCity($city){
        $this->city = $this->db->real_escape_string($city);
    }
    public function getAdress(){
        return $this->adress;
    }
    public function setAdress($adress){
        $this->adress = $this->db->real_escape_string($adress);
    }
    public function getCost(){
        return $this->cost;
    }
    public function setCost($cost){
        $this->cost = $cost;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getHour(){
        return $this->hour;
    }
    public function setHour($hour){
        $this->hour = $hour;
    }
    public function getAll(){

        $sql = "SELECT * FROM orders ORDER BY id DESC";
        $orders = $this->db->query($sql);

        return $orders;
    }
    public function getOrder(){

        $order =$this->db->query("SELECT * FROM orders WHERE id = {$this->getId()}");

        return $order->fetch_object();
    }

    // Obtiene el ultimo pedido
    public function getOrderByUser(){
        // order by desc limit trae el ultimo pedido
        $sql = "SELECT o.id, o.cost FROM orders o
                        WHERE o.user_id = {$this->getUserId()} ORDER BY id DESC LIMIT 1";

        $order =$this->db->query($sql);

        return $order->fetch_object();
    }

    // Obtiene todo los pedido por user
    public function getOrdersByUser(){
        // order by desc limit trae el ultimo pedido
        $sql = "SELECT * FROM orders
                    WHERE user_id = {$this->getUserId()} ORDER BY id DESC";

        $order =$this->db->query($sql);

        return $order;
    }

    public function getProductsByOrder($id){

        $sql = "SELECT p.*, lo.units_order FROM products p
                    INNER JOIN lines_orders lo ON p.id = lo.product_id
                        WHERE lo.order_id = {$id}";

        $products = $this->db->query($sql);

		return $products;
    }

    public function save(){

        $sql = "INSERT INTO orders
                    VALUES(NULL, {$this->getUserId()}, '{$this->getState()}', '{$this->getCity()}', '{$this->getAdress()}', {$this->getCost()}, 'confirm', CURDATE(), CURTIME());";

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

    public function save_lines(){
        // Obtener el ultimo id insertado
        $sql = "SELECT LAST_INSERT_ID() as 'order'";

        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->order;

        foreach ($_SESSION['cart'] as $element) {
            $product = $element['product'];

            $insert = "INSERT INTO lines_orders VALUES(NULL, {$order_id}, {$product->id}, {$element['units']})";
            $save = $this->db->query($insert);

            // var_dump($product);
            // var_dump($insert);
            // echo $this->db->error;
            // die();
        }

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE orders SET status = '{$this->getStatus()}' WHERE id = {$this->getId()};";

        // $sql .= " WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}



?>