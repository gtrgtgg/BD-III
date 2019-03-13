<?php
require_once("Clases/conexion.php");  // requery la clase de la conexion
require_once("Clases/usuarios.php");  // requery la clase de la conexion

$provee=new Usuario();
$artic=new Usuario();
$proveedor=$provee->get_persona();
$articulos=$artic->get_productoIngreso();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){  //ojo esto esta antes del submit
    $artic->AgregarFactura();
    exit();
 }?>
<!DOCTYPE html>
<html>
<head>
  <title>Licores Premier | Facturas</title>
  <?php require_once("LibreriasBootstrap.php");?>  <!--aqui estan todos los estilo de css --> 
 <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">

</head>
<body>
  <div class="container-fluid">
     <div>
         <?php require_once("Menu.php");?> <!--aqui estan el menu de opciones -->
        </div>

            <div class="container-fluid">
              <div class="row">
                <link rel="stylesheet" href="css/bootstrap-select.min.css">
<!-- este es la hoja de estilo de booctrac para seleccionar-->
              
                 
  <div class="panel panel-default"> <!--este es mi formulario el cuAL VAN TODOS MIS CAMPOS-->
    <div class="panel-heading" > <!--Para el titulo-->
      <h3 class="panel-title" ><span class="glyphicon glyphicon-user" aria-hidden="true" style="background-color:#54EDE2"> </span>  MODULO DE FACTURAS</h3>
                          <?php
   if(isset($_GET['m'])){
    switch ($_GET['m']){
      case '1':
        ?>
        <div class="alert alert-danger">
         <strong>ERROR</strong>  AL INGRESAR LA COMPRA
        </div>
        <?php 
        break;
         case '2':
        ?>
        <div class="alert alert-success">
         <strong>EXITOSO</strong>  COMPRA CON EXITO
        </div>
        <?php 
        break;
    }
   }
  ?>
    </div>
     <div class="panel-body">
               <form action="" method="post" class="form-horizontal">

                         <div class="row"> 
               <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <div class="form-group">
              <label for="" class="col-sm-2 control-label">Cliente: </label>
              <div class="col-sm-6">
               <select name="idpersona" id="idproveedor" class="form-control selectpicker" data-live-search="true" >
                  <?php 
                                     for($i=0; $i<sizeof($proveedor); $i++) { 
                                      ?>
                                        <option value="<?php echo $proveedor[$i]["idpersona"] ?>"> <?php echo $proveedor[$i]["nombre"]; ?> </option>
                                      <?php } ?>
             </select>
              </div>
             </div>
           </div>

      <div class="col-lg-4 col-sm-4col-md-4 col-xs-12">
         <div class="form-group">
          <label>Tipo de comprobante</label>

          <select name="tipo_comprobante" class="form-control">
            <option value="Boleta">Boleta</option>
            <option value="Factura">Factura</option>
            <option value="Ticket">Ticket</option>
          </select>
         </div>
      </div>

     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
              <label for="num_comprobante">Num Comprobante</label>
              <input type="num" name="num_comprobante" class="form-control"   placeholder="Num de comprobante..." required="">            
      </div>
      </div>

    </div>
<!--cierro la fiila e igualmente abro una  nueva fila  encerrar todo el detalle y los botones -->

  <div class="panel-body">
      <form action="" method="post" class="form-horizontal">
             <div class="row"> 
               <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Articulo </label>
              <div class="col-sm-6">
               <select name="pidarticulo"   id="pidarticulo"  class="form-control selectpicker" data-live-search="true" >
                  <?php 
                                     for($i=0; $i<sizeof($articulos); $i++) { 
                                      ?>
                                        <option value="<?php echo $articulos[$i]["idproducto"] ?>"><?php echo " Stock :  " .$articulos[$i]["stock"];?> <?php echo $articulos[$i]["nombre"];    ?> </option>
                                      <?php } ?>
             </select>
              </div>
            </div>
            </div>
            </div>
            </div>

<div class="col-lg-4 col-sm-2.5 col-md-4 col-xs-16">
<div class="form-group">
<label for="cantidad">Cantidad: </label> <br> 
<input type="number" name="pcantidad" id="pcantidad" class="form-group" placeholder="Cantidad"> 
</div>
</div>


<div class="col-lg-2.5 col-sm-2.5 col-md-4 col-xs-16">
<div class="form-group">
<label for="cantidad">Precio venta: </label> <br> 
<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-group" placeholder="P. venta $"> 
</div>
</div>



<div class="col-lg-2.5 col-sm-3 col-md-4 col-xs-12">
<div class="form-group">
<label for="cantidad">Agregar: </label> <br> 
<button type="button" id="bt_add" class="btn btn-primary" style="background-color:#16F0B1">Agregar</button> 
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"></div>
<table  id="detalles" class="table table-striped table-bordered table-condensed table-hover">
  <thead style="background-color:#D5F016">
    <th>Opciones</th>
    <th>Articulo</th>
    <th>Cantidad</th>
    <th>Precio Venta</th>
    <th>Subtotal</th>
    

  </thead>
  <!--pie de la tabala-->
   <tfoot>
     
  
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
   
   
    
   </tfoot>
</table>
 
</div>
</div>


<table  id="detalles2" class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
  <thead style="background-color:#D6D2D3">
    <th>Total Venta</th>
  </thead>
  <!--pie de la tabala-->
   <tfoot>
   
    <th> <h4 id="total" >S/. 0.00</h4> </th>
   </tfoot>

</table>

            <div class="col-lg-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
             <input type="hidden" name="grabar" value="si">
              <button class="btn btn-primary" type="submit">Guardar</button>
              <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
             </div>

              <input type="hidden" name="grabar" value="si">  <!--ojoooooo--->
                         

<script>
//evalua el evento click del boton agregar que tiene un id llamado bt_add en el cual toda la informacion lo manda al array del java scri`pt
  $(document).ready(function(){
    $('#bt_add').click(function(){
    agregar();
    });
     evaluar();
    });
  var cont=0;
    total=0;
    total_ganancia=0;
    subganancias=0;    
  //agrego un array que esta vacio capturar todos los subtotales
  subtotal=[];
  ganancia=[];
  porcentaje=[];
//voy a leer todos los datos que tengo 

function agregar(){
// tomo el valor que esta en el id
idarticulo=$("#pidarticulo").val();
articulo=$("#pidarticulo option:selected").text();
cantidad=$("#pcantidad").val();
precio_venta=$("#pprecio_venta").val();


//valido si idarticulo es diferente a vacio
if (idarticulo!=""  && cantidad!="" && cantidad>0  && precio_venta!="") {
subtotal[cont]=(cantidad*precio_venta);
total=total+subtotal[cont];

//agregoo una fila a mi tabla
var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning"  onClick="eliminar('+cont+'); ">X</td>   <td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'" > '+articulo+' </td>   <td><input type="number" name="cantida[]" value="'+cantidad+'"></td>            <td><input type="number" name="precio_venta[]" value="'+precio_venta+'" ></td>      <td>'+subtotal[cont]+' </td>       </tr>';
cont++;
//despues de oasar todo a la fila llamo a mi funcion limpiar para dejar las cajas vacias
limpiar();
$("#total").html("S/. "+total);

//paso al id total conhtml la variable total
//despues llamo a la funcion evaluar par que me muestre los detalles
evaluar();
//id de l tabla agrega la fila que esta aqui
$("#detalles").append(fila);
}else{
  alert("Error al ingresar el detalle del ingreso, revisar los datos del articulo");
}

}

//funcion que me permita limpiar la caja de texto
function limpiar(){

$("#pcantidad").val("");
$("#pprecio_compra").val("");
$("#pprecio_venta").val("");
}

// declaro una funcion para esconder los botones de guardar si no tengo nada escrito en el formulario
function evaluar(){
  //si el total es mayor a 0 muestro los botones
  if (total>0) {
    $("#guardar").show();
  }
  else{
    //si no guardar lo escondo
    $("#guardar").hide();
  }
}

function eliminar(index){
  total=total-subtotal[index];
  $("#total").html("S/. "+total);

  $("#fila"+index).remove();
  evaluar();
}

</script>

 </form>
            </div> 
               </div>
                   </div>
                     </div> 
                      </div> 
              <script src="js/bootstrap-select.min.js"></script>
   <!-- hoja de estilo java scrip silvio moreto -->
   
             </div>

               <div class="last-div">
      <div class="container" style="background-color:#20C1F1">
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

</body>
</html>
