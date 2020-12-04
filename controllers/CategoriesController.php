<?php
require_once 'models/Category.php';
require_once 'models/Product.php';

class CategoriesController{

    public function index(){

        Helpers::isAdmin();

        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/categories/index.php';
    }
    public function show(){

        if(isset($_GET['id'])){
            // Obtener el id
            $id = $_GET['id'];

            // Conseguir category
            $category = new Category();
            $category->setId($id);
            $category = $category->getCategory();

            // Conseguir products
            $product = new Product();
            $product->setCategoryId($id);
            $products = $product->getProductCategory();
        }

        require_once 'views/categories/show.php';
    }

    public function create(){
        Helpers::isAdmin();

        require_once 'views/categories/create.php';
    }

    public function save(){

        Helpers::isAdmin();

        if(isset($_POST) && isset($_POST['name'])){

            $category = new Category();
            $category->setName($_POST['name']);
            $save = $category->save();

        }
        header("Location:".base_url."categories/index");
    }

}


?>