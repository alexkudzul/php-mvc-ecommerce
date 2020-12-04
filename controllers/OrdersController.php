<?php

require_once 'models/Order.php';

class OrdersController{

    // Hacer pedidos
    public function do(){

        require_once 'views/orders/do.php';
    }

    // Agregar pedidos
    public function add(){

        if(isset($_SESSION['user_identity'])){

            $user_id = $_SESSION['user_identity']->id;
            $state = isset($_POST['state']) ? $_POST['state'] : false;
            $city = isset($_POST['city']) ? $_POST['city'] : false;
            $adress = isset($_POST['adress']) ? $_POST['adress'] : false;

            $stats = Helpers::statsCart();
            $cost = $stats['total'];

            if($state && $city && $adress){
                // Guardar datos en db
                $order = new Order();
                $order->setUserId($user_id);
                $order->setState($state);
                $order->setCity($city);
                $order->setAdress($adress);
                $order->setCost($cost);
                $save = $order->save();

                // Guardar lines pedido
                $save_line = $order->save_lines();

                if ($save && $save_line) {
                    $_SESSION['order'] = "completed";
                } else {
                    $_SESSION['order'] = "failed";
                }

            }else{
                $_SESSION['order'] = "failed";
            }

            header("Location:".base_url.'orders/confirm');

        }else{
            header("Location:".base_url);
        }
    }

    // Confirmar pedido
    public function confirm(){
        if(isset($_SESSION['user_identity'])){
            $identity = $_SESSION['user_identity'];
            $order = new Order();
            $order->setUserId($identity->id);

            // order sera pasado a la vista
            $order = $order->getOrderByUser();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($order->id);
        }

        require_once 'views/orders/confirm.php';
    }

    // Mis pedidos
    public function my_orders(){

        Helpers::isIdentiy();
        $user_id = $_SESSION['user_identity']->id;
        $order = new Order();

        // Obtiene los pedidos del user
        $order->setUserId($user_id);
        $orders = $order->getOrdersByUser();

        require_once 'views/orders/my_orders.php';
    }

    // Detalle del pedido
    public function detail(){
        Helpers::isIdentiy();
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Sacar el pedido
            $order = new Order();
            $order->setId($id);
            $order = $order->getOrder();

            // Sacar los  productos
            $order_products = new Order();
            $products = $order_products->getProductsByOrder($id);

            require_once 'views/orders/detail.php';
        }else{
            header("Location:".base_url.'orders/my_orders');
        }
    }

    // Administra pedidos solo admins
    public function manage(){
        Helpers::isAdmin();

        $manage = true;

        $order = new Order();
        $orders = $order->getAll();

        require_once 'views/orders/my_orders.php';
    }

    // Editar el status del pedido
    public function status(){
        Helpers::isAdmin();

        if(isset($_POST['order_id']) && isset($_POST['status'])){

            // Recoger datos del form
            $id = $_POST['order_id'];
            $status = $_POST['status'];

            // Update del pedido
            $order = new Order();
            $order->setId($id);
            $order->setStatus($status);
            $order->edit();

            header("Location:".base_url.'orders/detail&id='.$id);

        }else{
            header("Location:".base_url);
        }
    }
}

?>