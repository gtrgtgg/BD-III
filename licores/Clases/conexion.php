<?php
 session_start();
 class Conectar{
       protected $dbh;  // declaro la variable que voy a instanciar
       protected function conexion(){
        $conectar= $this->dbh= new PDO("mysql:local=localhost; dbname=database","root","");
        return $conectar;// retorno                     localhost      nombre de la base de datos, contraseña  aqui hago la conexion
        }

public function set_names(){
             return $this->dbh->query("SET NAMES 'utf8'"); // para las tildes y no tener problema
}

public function ruta(){ // esta es la ruta
        return "http://localhost/licores/"; // ijo esta ruta debo modificarla cuando este en el servidor
}
    }
?>