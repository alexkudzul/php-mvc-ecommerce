<?php

require_once 'models/Product.php';

class ProductsController{

    public function index(){
        $product = new Product();
        $products = $product->getProductRandom(6);

        require_once 'views/products/products.php';
    }

    public function show(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $product = new Product();
            $product->setId($id);
            $productOne = $product->getProduct();
        }

        require_once 'views/products/show.php';
    }

    public function manage(){
        Helpers::isAdmin();

        $product = new Product();
        $products = $product->getAll();
        require_once 'views/products/manage.php';
    }

    public function create(){
        Helpers::isAdmin();

        require_once 'views/products/create.php';
    }

    public function save(){
        Helpers::isAdmin();

        if(isset($_POST)){
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            // $image = isset($_POST['image']) ? $_POST['image'] : false;

            if($name && $description && $price && $stock && $category){

                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategoryId($category);
                // $product->setImage($image);

                // Guardar imagenes
                if(isset($_FILES['image'])){
                    $file = $_FILES['image'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    // var_dump($file);
                    // die();

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        // Si no existe un directorio, crea el directorio, con sus permiso
                        if(!is_dir('uploads/images')){

                            mkdir('uploads/images', 0777, true);
                        }

                        $product->setImage($filename);
                        // Mueve los archivos a un nuevo locacion
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }
                }

                //
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $product->setId($id);

                    $save = $product->edit();
                }else{
                    $save = $product->save();
                }

                if($save){
                    $_SESSION['product'] = "completed";
                }else{
                    $_SESSION['product'] = "failed";
                }
            }else{
                $_SESSION['product'] = "failed";
            }

        }else{
            $_SESSION['product'] = "failed";
        }
        header("Location:".base_url."products/manage");
    }

    public function edit(){
        Helpers::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $product = new Product();
            $product->setId($id);
            $productOne = $product->getProduct();
            require_once 'views/products/create.php';
        }else{
            header("Location:".base_url."products/manage");
        }
    }

    public function delete(){
        Helpers::isAdmin();

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            $product = new Product();
            $product->setId($id);
            $delete = $product->delete();

            if($delete){
                $_SESSION['delete'] = "completed";
            }else{
                $_SESSION['delete'] = "failed";
            }
        }else{
            $_SESSION['delete'] = "failed";
        }

        header("Location:".base_url."products/manage");
    }
}


?>