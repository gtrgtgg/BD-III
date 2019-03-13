<?php
require_once("Clases/conexion.php"); // llamamos a la conexion
require_once("Clases/usuarios.php"); // llamamos a la conexion


if(isset($_SESSION["idusuario"])){
  $usuario=new Usuario();

  $datos=$usuario->get_usuario();  // llamamos al metodo get_ususario de userModulo
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
 <!-- <link href="public/images/pegar.ico" type="image/x-icon" rel="shortcut icon" />   ESTO AQUI ES PARA COOCARLE EL LOGO-->
  <meta charset="UTF-8">
  <title>Categoria</title>
    <?php require_once("LibreriasBootstrap.php");?>  <!--aqui estan todos los estilo de css -->

  <?php require_once("head_css_tabla.php");?> <!--aqui estan todos los estilo de css -->

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/set1.css" />
  <link href="css/overwrite.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: eNno
    Theme URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a><h1><span>Licores Premier</span></h1></a>
      </div>
      <div class="navbar-collapse collapse">
        <div>
         <?php require_once("Menu.php");?> <!--aqui estan el menu de opciones -->
        </div>
      </div>
    </div>
  </nav>

    <div class="container-fluid">
      

      <div class="container-fluid">
        <div class="row">
         

          <div class="col-sm-11">
   <br><br> <br><br>
            <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 >USUARIOS</h3>
                            <?php
   if(isset($_GET['mar'])){
    switch ($_GET['mar']){
      case '1':
        ?>
        <div class="alert alert-danger">
         <strong>EXITOSO</strong>  ELIMINADO USUARIO
        </div>
        <?php 
        break;
    }
   }
  ?>
<?php  
    if(isset($_GET['m'])){
    switch ($_GET['m']){
      case '1':
        ?>
        <div class="alert alert-danger">
         <strong>ERROR AL EDITAR USUARIO </strong>  CAMPO VACIO
        </div>
        <?php 
        break;
         case '2':
        ?>
        <div class="alert alert-success">
         <strong>EXITOSO  </strong>  EDITADO USUARIO
        </div>
        <?php 
        break;
    }
   }
  ?>
                              </div>
                            <div class="panel-body">
                                  <table class="table" id="myTable">
                                    <thead>
                                      <tr>
                                        <th>Id</th>
                                      <th>Usuario</th>
                                      <th>Cedula</th>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>Gmail</th>
                                      <th>Opciones</th>
                                      
                                           </tr>
                                    </thead>
                                    <tbody>
                                      <?php for ($i=0; $i <sizeof($datos); $i++) { // instancie dato de clasePrograma
                                       ?>
                                      <tr>
                                        <td><?php echo $datos[$i]["idusuario"] ?></td>
                                        <td><?php echo $datos[$i]["tipousuario"] ?></td>
                                        <td><?php echo $datos[$i]["cedula"] ?></td>
                                        <td><?php echo $datos[$i]["nombre"] ?></td>
                                        <td><?php echo $datos[$i]["apellido"] ?></td>
                                        <td><?php echo $datos[$i]["gmail"] ?></td>

                                        <td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>EditarUsuario.php?idusuario=<?php echo $datos[$i]["idusuario"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> Editar</a> <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>EliminarUsuario.php?idusuario=<?php echo $datos[$i]["idusuario"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td> 
                                        </tr>
                                      <?php }?>
                                    </tbody>
                                  </table>

                                  <center>
                                  <a href="AgregarUsuario.php"><button class="btn btn-info">Agregar Usuario</button></a>
                                  </center>
                                </div>
                        </div>

      </div>
    </div>
  </div>


       <?php require_once("paginador.php");?> <!-- paginador para pasar a la siguiente lista-->
    </div><!--container-fluid-->

   <div class="last-div">
      <div class="container">
        <div class="row">
          <div class="copyright">
            &copy; Licores PremierDerecho reservado 2019
            <div class="credits">
              <!--
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eNno
              -->
            </div>
          </div>
        </div>
      </div>

</body>
</html>
<?php 
}else{
  header("Location:".Conectar::ruta()."index.php"); 

}
?>


























