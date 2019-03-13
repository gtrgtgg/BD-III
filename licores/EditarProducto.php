<?php

 require_once("Clases/conexion.php");

  if(isset($_SESSION["idusuario"])){
     
     require_once("Clases/usuarios.php");
   
    $usuario=new Usuario();

  $categ=$usuario->get_categoria();  // llamamos al metodo get_ususario de userModulo

    $datos=$usuario->get_producto_por_id($_GET["idusuario"]);
 
    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
      $usuario->editar_producto();
       exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Licores Premier-Editar</title>

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
        <a class="navbar-brand"><span>Milsabores</span></a>
      </div>
      <div class="navbar-collapse collapse">
        <div class="menu">
          <?php require_once("Menu.php");?> <!--aqui estan el menu de opciones -->
        </div>
      </div>
    </div>
  </nav>


  <footer>
    <br><br><br>
    <center>
    <h1>Editar Producto</h1>

    </center>
               <form  method="post" class="form-horizontal">
                
              
                <div class="form-group">
              <label for="" class="col-sm-2 control-label">Categoria: </label>
              <div class="col-sm-6">
                           <select name="idcategoria" class="form-control"> <!--aqui empieza la ista desplegle-->
                            
              <?php
              for($i=0; $i<sizeof($categ);$i++){
           if($categ[0]["idcategoria"]==$categ[$i]["idcategoria"]){                                                    
                        ?>
    <option value="<?php echo $categ[$i]["idcategoria"];?>" selected="selected"><?php echo $categ[$i]["nombre"];?></option>                      
                      <?php                                               
                     } else { 
                                                 
                     ?>
                   <option value="<?php echo $categ[$i]["idcategoria"];?>"><?php echo $categ[$i]["nombre"];?></option>
                    
                     <?php
                     }
                    }
               ?>
                           </select> <!--aqui  termina la lista desplegable para modificar  -->
              </div>
                </div>
              

  
              <div class="form-group">
              <label for="" class="col-sm-2 control-label">codigo </label>
              <div class="col-sm-6">
                <input type="text" name="codigo" class="form-control" placeholder="Ingrese codigo" value="<?php echo $datos[0]["codigo"];?>">
              </div>
                </div>
              
                  
              <div class="form-group">
              <label for="" class="col-sm-2 control-label">Nombre </label>
              <div class="col-sm-6">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre" value="<?php echo $datos[0]["nombre"];?>">
              </div>
                </div>
            
          
              <div class="form-group">
              <label for="" class="col-sm-2 control-label">Stock </label>
              <div class="col-sm-6">
                <input type="number" name="stock" class="form-control" placeholder="Ingrese stock Del Producto" value="<?php echo $datos[0]["stock"];?>">
              </div>
                </div>


              
              <input type="hidden" name="grabar" value="si">

              <input type="hidden" name="id" value="<?php echo $_GET["idusuario"];?>">
           <center>
              <button type="submit"  class="bbtn btn-primary">ACTUALIZAR PRODUCTO</button>
                   </center>       
                          </form>
          
<br><br><br><br>

    <div class="last-div">
      <div class="container">
        <div class="row">
          <div class="copyright">
            &copy; Licores Premier Derecho reservado 2019
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
