<?php

require_once 'models/User.php';

class UsersController{

    public function index(){
        echo "Users Accion index";
    }

    public function register(){
        require_once 'views/users/register.php';
    }

    public function save(){
        if(isset($_POST)){
            // Validacion
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            // Si es true
            if($name && $lastname && $email && $password){
                $user = new User();
                $user->setName($name);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($password);
                $save = $user->save();
                // var_dump($user);


                if($save){
                    $_SESSION['register'] = "completed";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }

        }else{
            $_SESSION['register'] = "failed";
        }

        header("Location:".base_url."users/register");
    }

    public function login(){
        if(isset($_POST)){

            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user_identity = $user->login();

            if($user_identity && is_object($user_identity)){

                // session para mantener al user identificado
                $_SESSION['user_identity'] = $user_identity;

                // session cuando el rol es admin
                if($user_identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }

            }else{
                $_SESSION['error_login'] = 'Login failed';
            }
        }

        header("Location:".base_url);
    }

    public function logout(){
        // session_unset libera todas las variables de sesion actualmente registrada

        if(isset($_SESSION['user_identity'])){
            unset($_SESSION['user_identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);
    }
}


?>