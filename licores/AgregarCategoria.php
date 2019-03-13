<?php
require_once("Clases/conexion.php"); 

 if(isset($_SESSION["idusuario"])){


  if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){  
    require_once("Clases/usuarios.php");  
    $usuario= new Usuario(); 


    $usuario->AgregaCategoria();
    exit();
 }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar categoria</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="../css/demo.css" />
  <link rel="stylesheet" type="text/css" href="../css/set1.css" />
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
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" ><span>Milsabores</span></a>
      </div>
      <div class="navbar-collapse collapse">
        <div class="menu">
          <?php require_once("Menu.php");?> <!--aqui estan el menu de opciones -->
        </div>
      </div>
    </div>
  </nav>


  <footer>
    <br><br><br><br>
    <center>
    <h1>Agregar Categoria</h1>
    <?php
   if(isset($_GET['m'])){
    switch ($_GET['m']){
      case '1':
        ?>
        <div class="alert alert-danger">
         <strong>Peligro!</strong>Campos Vacios
        </div>
        <?php 
        break;
      case '2':
        ?>
        <div class="alert alert-success">
        <strong>Exitoso!</strong> Categoria Ingresado Exitosamente
         </div> 
        <?php
        break;
         case '3':
        ?>
        <div class="alert alert-success">
        <strong>ERROR!</strong> HUBO UN ERROR AL INGRESAR LOS DATOS
         </div> 
        <?php
        break;

    }
   }
  ?>
    </center>
               <form  method="post" class="form-horizontal">

           
    
              
              
                  
              
              <div class="form-group">
              <label for="" class="col-sm-2 control-label">Nombre de la Categoria: </label>
              <div class="col-sm-6">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese Categoria">
              </div>
                </div>
              

             
              <br><br><br><br><br>
              <input type="hidden" name="grabar" value="si">
           <center>
             <h1>TODO LO PUEDO EN CRISTO QUE ME FORTALECE</h1>
              <button type="submit"  class="bbtn btn-primary">REGISTRAR CATEGORIA</button>
                   </center>       
                          </form>
          
<br><br>

    <div class="last-div">
      <div class="container">
        <div class="row">
          <div class="copyright">
            &copy; Licores Premier reservado 2019
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
      
    </div>
  </footer>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    $('.portfolio').flipLightBox()
  </script>

</body>

</html>


<?php 
}else{
  header("Location:".Conectar::ruta()."index.php"); 

}
?>
