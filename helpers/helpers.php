<?php

class Helpers{
    public static function deleteSession($name){

        if(isset($_SESSION[$name])){

            $_SESSION[$name] = null;
            unset($_SESSION[$name]);

        }

        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    // Esta logueado o identificado
    public static function isIdentiy(){
        if(!isset($_SESSION['user_identity'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategories(){
        require_once 'models/Category.php';
        $category = new Category();
        $categories = $category->getAll();

        return $categories;
    }

    // Estadisticas del carrito
    public static function statsCart(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if(isset($_SESSION['cart'])){

            // Cantidad de productos
            $stats['count'] = count($_SESSION['cart']);

            // Total en precio de los productos
            foreach($_SESSION['cart'] as $product){
                // += sumar lo que ya habia antes mas este nuevo producto
                $stats['total'] += $product['price'] * $product['units'];
            }
        }

        return $stats;
    }

    public static function showStatus($status){
        $value = 'Pendient';
        if($status == 'confirm'){
            $value = 'Pendient';
        }elseif($status == 'preparation'){
            $value = 'Preparation';
        }elseif($status == 'ready'){
            $value = 'Prepare to send';
        }elseif($status == 'sended'){
            $value = 'Sended';
        }

        return $value;
    }
}


?>