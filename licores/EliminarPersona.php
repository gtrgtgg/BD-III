<?php

   require_once("Clases/conexion.php"); 

   if(isset($_SESSION["idusuario"])){  

      require_once("Clases/usuarios.php");  

      $usuario=new Usuario();
      

      $usuario->Eliminarpersona($_GET["idusuario"]); 


      header("Location:".Conectar::ruta()."Mpersona.php?mar=1");  
      exit(); 
   
   } else{

   	  header("Location:".Conectar::ruta()."index.php"); 
   } 


 ?>