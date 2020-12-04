<?php

class User{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $rol;
    private $image;
    private $db;

    /*  mysqli_real_escape_string,  scape, no lo interpreta como parte del lenguaje, se enfoca en el INSERT "''"
        Lo que entré sera como string, esto evitando usar las comillas simples o dobles y que la bd devuelva un error
        Implementado el scape ya se podra ingresar comillas simples y dobles
    */
    // CIFRAR LA CONTRASEÑA
    // cost, es el coste o el numero de veces que se cifra la contraseña, en este caso sera 4

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
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = $this->db->real_escape_string($lastname);
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    public function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getRol(){
        return $this->rol;
    }
    public function setRol($rol){
        $this->rol = $rol;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function save(){

        $sql = "INSERT INTO users
                    VALUES(NULL, '{$this->getName()}', '{$this->getLastname()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }
    public function login(){

        /**
         * variable para mantener el status
         * si es que verify es true se guarda los datos obtenidos en $result
         */
        $result = false;

        // datos que viene desde el form
        $email = $this->email;
        $password = $this->password;

        // Comprobar si existe el user
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $login = $this->db->query($sql);

        /**
         * Si es true y el numero de filas que devuelve la db es igual o mayor a 1(significa que si existe)
         * fetch_object, Devuelve la fila actual de un conjunto de resultados como un objeto
         * $password la que llega desde el form y $user->password lo que esta guardado en la db
         */
        if($login && $login->num_rows == 1){

            $user = $login->fetch_object();

            $verify = password_verify($password, $user->password);

            if($verify){
                $result = $user;
            }
        }

        return $result;
    }
}

?>