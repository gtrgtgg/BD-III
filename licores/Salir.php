<?php
require_once("Clases/conexion.php");

session_destroy();   
//<!-- aqui destruyo la session para que no puedan acceder por medio de redireccionamiento 

header("Location:".Conectar::ruta()."index.php");
//lo mando directamiente al login "inicio"


