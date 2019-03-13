<?php
class Usuario extends Conectar{

public function login(){

         $conectar=parent::conexion();
         parent::set_names();

         if(empty($_POST["user"]) and empty($_POST["contrasena"])){

           header("Location:".Conectar::ruta()."index.php");
           exit();
         }
         $sql="select * from usuario where gmail=? and contracena=?"; //

         $sql=$conectar->prepare($sql);  //

         $sql->bindValue(1, $_POST["user"]);
         $sql->bindValue(2, $_POST["contrasena"]);
         $sql->execute();
         $resultado=$sql->fetch(PDO::FETCH_ASSOC);

         if(is_array($resultado)==true and count($resultado)>=1){
           $_SESSION["idusuario"]=$resultado["idusuario"];
           $_SESSION["user"]=$resultado["nombre"];


           header("Location:".Conectar::ruta()."inicio.php");
           exit();// cortamos la

              }
              else{
                   header("Location:".Conectar::ruta()."index.php");
                 exit();
              }
                }


        public function get_usuario(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="select * from usuario ;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }



      public function AgregarUsuario(){

        $conectar=parent::conexion();
        parent::set_names();


         if(empty($_POST["tipousuario"]) or empty($_POST["cedula"]) or empty($_POST["nombre"]) or empty($_POST["apellido"])or empty($_POST["user"]) or empty($_POST["contracena"]) or empty($_POST["confirmar"]) ){

           header("Location:".Conectar::ruta()."AgregarUsuario.php?m=1");
           exit();
        }

         $contra= $_POST["contracena"];
         $confirm= $_POST["confirmar"];
if($contra==$confirm){
        $conectar=parent::conexion();
        $sql="insert into usuario values(null,?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["tipousuario"]);
        $sql->bindValue(2, $_POST["cedula"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["apellido"]);
        $sql->bindValue(5, $_POST["user"]);
        $sql->bindValue(6, $_POST["contracena"]);
        $sql->bindValue(7, $_POST["confirmar"]);


        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."AgregarUsuario.php?m=2");
        exit();
      }
 else{
        header("Location:".Conectar::ruta()."AgregarUsuario.php?m=3");
        exit();

      }
}


      //------FUNCION PARA AGREGAR UN USUARIO---------------------------------------------------------------------------------------------


         public function AgregaCategoria(){

        $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["nombre"])){

           header("Location:".Conectar::ruta()."AgregarCategoria.php?m=1");
           exit();
        }

        $conectar=parent::conexion();
        $sql="insert into categoria values(null,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["nombre"]);

        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."AgregarCategoria.php?m=2");
        exit();

        header("Location:".Conectar::ruta()."AgregarCategoria.php?m=3");
        exit();

      }



           // ******** METODO PARA BUSCAR EL ID DEL QUE VAMOS A EDITAR
      public function get_usuario_por_id($id_usuario){

         $conectar=parent::conexion();// hacemos nuestra conexion
        parent::set_names(); // este es para no tener probllemas con las tilde

        $sql="select * from usuario where idusuario=?";

        $sql=$conectar->prepare($sql); //HACE UNA CONSULTA EN TODOS LOS CAMPOS

        $sql->bindValue(1,$id_usuario);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }


   // FUNCION PARA EDITAR USUARIOS


         public function editar_usuarios(){

        $conectar=parent::conexion(); // hacemos nuestra conexion
        parent::set_names(); // para no tener problemas con las tildes

           if(empty($_POST["tipousuario"])  or empty($_POST["cedula"]) or empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["gmail"])  or empty($_POST["contracena"]) or empty($_POST["confirmar"])){

           header("Location:".Conectar::ruta()."Musuario.php?idusuario=".$_POST["idusuario"]."&m=1");
           exit();
        }


        $sql="update usuario set

        tipousuario=?,
        cedula=?,
        nombre=?,
        apellido=?,
        gmail=?,
        contracena=?,
        confirmar=?
        where
        idusuario=?
        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["tipousuario"]);
        $sql->bindValue(2, $_POST["cedula"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["apellido"]);
        $sql->bindValue(5, $_POST["gmail"]);
        $sql->bindValue(6, $_POST["contracena"]);
        $sql->bindValue(7, $_POST["confirmar"]);
        $sql->bindValue(8, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."Musuario.php?idusuario=".$_POST["idusuario"]."&m=2");
        exit();

      }

      //____________ELIMINAR UN USUARIO


       public function EliminarUsuario($id_usuario){  // paso el id que va por la url  por parametro

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from usuario where idusuario=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_usuario);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }





      //******************************************************************************************************************
      //******************************************************************************************************************

            //FUNCIONES DE LA ENTIDAD CATEGORIA
      //******************************************************************************************************************
      //******************************************************************************************************************


       public function get_categoria(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="select * from categoria ;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

             // ******** METODO PARA BUSCAR EL ID DEL QUE VAMOS A EDITAR
      public function get_categoria_por_id($id_usuario){

         $conectar=parent::conexion();// hacemos nuestra conexion
        parent::set_names(); // este es para no tener probllemas con las tilde

        $sql="select * from categoria where idcategoria=?";

        $sql=$conectar->prepare($sql); //HACE UNA CONSULTA EN TODOS LOS CAMPOS

        $sql->bindValue(1,$id_usuario);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }




         public function editar_categoria(){

        $conectar=parent::conexion(); // hacemos nuestra conexion
        parent::set_names(); // para no tener problemas con las tildes

           if(empty($_POST["nombre"])){

           header("Location:".Conectar::ruta()."Mcategoria.php?idusuario=".$_POST["idusuario"]."&m=1");
           exit();
        }


        $sql="update categoria set
        nombre=?
        where
        idcategoria=?
        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["nombre"]);
        $sql->bindValue(2, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."Mcategoria.php?idusuario=".$_POST["idusuario"]."&m=2");
        exit();

      }



      //____________ELIMINAR UN CATEGORIA


       public function EliminarCategoria($id_usuario){  // paso el id que va por la url  por parametro

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from categoria where idcategoria=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_usuario);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }


     //******************************************************************************************************************
      //******************************************************************************************************************

            //FUNCIONES DE LA ENTIDAD ARTICULO
      //******************************************************************************************************************
      //******************************************************************************************************************


           public function get_producto(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="SELECT producto.idproducto, categoria.nombre as nom,producto.codigo,producto.nombre, producto.stock FROM categoria,producto where categoria.idcategoria=producto.idcategoria;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

        public function get_productoIngreso(){

        $conectar=parent::conexion();
        parent::set_names();

           $sql="select * from producto;";;

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

             //------FUNCION PARA AGREGAR UN ARTICULO---------------------------------------------------------------------------------------------


         public function AgregarArticulo(){

        $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["idcategoria"]) or empty($_POST["codigo"]) or empty($_POST["nombre"]) or empty($_POST["stock"]) ){

           header("Location:".Conectar::ruta()."AgregarArticulo.php?m=1");
           exit();
        }

        $conectar=parent::conexion();
        $sql="insert into producto values(null,?,?,?,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["idcategoria"]);
        $sql->bindValue(2, $_POST["codigo"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["stock"]);

        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."AgregarArticulo.php?m=2");
        exit();

        header("Location:".Conectar::ruta()."AgregarArticulo.php?m=3");
        exit();

      }



     // ******** METODO PARA BUSCAR EL ID DEL QUE VAMOS A EDITAR
      public function get_producto_por_id($id_usuario){

         $conectar=parent::conexion();// hacemos nuestra conexion
        parent::set_names(); // este es para no tener probllemas con las tilde

        $sql="select * from producto where idproducto=?";

        $sql=$conectar->prepare($sql); //HACE UNA CONSULTA EN TODOS LOS CAMPOS

        $sql->bindValue(1,$id_usuario);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }


   // FUNCION PARA EDITAR USUARIOS

         public function editar_producto(){

        $conectar=parent::conexion(); // hacemos nuestra conexion
        parent::set_names(); // para no tener problemas con las tildes

           if(empty($_POST["idcategoria"])  or empty($_POST["codigo"]) or empty($_POST["nombre"]) or empty($_POST["stock"])){

           header("Location:".Conectar::ruta()."Mproducto.php?idusuario=".$_POST["idusuario"]."&m=1");
           exit();
        }


        $sql="update producto set

        idcategoria=?,
        codigo=?,
        nombre=?,
        stock=?
        where
        idproducto=?
        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["idcategoria"]);
        $sql->bindValue(2, $_POST["codigo"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["stock"]);;
        $sql->bindValue(5, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."Mproducto.php?idusuario=".$_POST["idusuario"]."&m=2");
        exit();

      }


      public function Eliminarproducto($id_usuario){  // paso el id que va por la url  por parametro

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from producto where idproducto=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_usuario);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }




         //******************************************************************************************************************
      //******************************************************************************************************************

            //FUNCIONES DE LA ENTIDAD PERSONA
      //******************************************************************************************************************
      //******************************************************************************************************************


     public function get_persona(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="select * from persona ;";

        $sql=$conectar->prepare($sql);

        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }


             //------FUNCION PARA AGREGAR UN USUARIO---------------------------------------------------------------------------------------------


         public function AgregarPersona(){

        $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["tipodepersona"]) or empty($_POST["cedula"]) or empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["telefono"]) or empty($_POST["direccion"]) or empty($_POST["gmail"]) ){

           header("Location:".Conectar::ruta()."AgregarPersona.php?m=1");
           exit();
        }

        $conectar=parent::conexion();
        $sql="insert into persona values(null,?,?,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["tipodepersona"]);
        $sql->bindValue(2, $_POST["cedula"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["apellido"]);
        $sql->bindValue(5, $_POST["telefono"]);
        $sql->bindValue(6, $_POST["direccion"]);
         $sql->bindValue(7, $_POST["gmail"]);

        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."AgregarPersona.php?m=2");
        exit();

        header("Location:".Conectar::ruta()."AgregarPersona.php?m=3");
        exit();

      }


          // ******** METODO PARA BUSCAR EL ID DEL QUE VAMOS A EDITAR
      public function get_persona_por_id($id_usuario){

         $conectar=parent::conexion();// hacemos nuestra conexion
        parent::set_names(); // este es para no tener probllemas con las tilde

        $sql="select * from persona where idpersona=?";

        $sql=$conectar->prepare($sql); //HACE UNA CONSULTA EN TODOS LOS CAMPOS

        $sql->bindValue(1,$id_usuario);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }


      // FUNCION PARA EDITAR USUARIOS

         public function editar_persona(){

        $conectar=parent::conexion(); // hacemos nuestra conexion
        parent::set_names(); // para no tener problemas con las tildes

            if(empty($_POST["tipodepersona"]) or empty($_POST["cedula"]) or empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["telefono"]) or empty($_POST["direccion"]) or empty($_POST["gmail"]) ){

           header("Location:".Conectar::ruta()."Mpersona.php?idusuario=".$_POST["idusuario"]."&m=1");
           exit();
        }


        $sql="update persona set

        tipodepersona=?,
        cedula=?,
        nombre=?,
        apellido=?,
        telefono=?,
        direccion=?,
        gmail
        where
        idpersona=?
        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["tipodepersona"]);
        $sql->bindValue(2, $_POST["cedula"]);
        $sql->bindValue(3, $_POST["nombre"]);
        $sql->bindValue(4, $_POST["apellido"]);
        $sql->bindValue(5, $_POST["telefono"]);
        $sql->bindValue(6, $_POST["direccion"]);
        $sql->bindValue(7, $_POST["gmail"]);
        $sql->bindValue(8, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."Mpersona.php?idusuario=".$_POST["idusuario"]."&m=2");
        exit();

      }



      //ELIMINAR PERSONA

            public function Eliminarpersona($id_usuario){  // paso el id que va por la url  por parametro

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from persona where idpersona=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_usuario);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }



               //******************************************************************************************************************
      //******************************************************************************************************************

            //FUNCIONES DE LA ENTIDAD INGRESO DE COMPRA   IngresoProducto
      //******************************************************************************************************************
      //******************************************************************************************************************

           public function AgregarIngreso(){
          $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["idpersona"]) or empty($_POST["tipo_comprobante"]) or empty($_POST["num_comprobante"])){

            header("Location:".Conectar::ruta()."AgregarIngreso.php?m=1");
           exit();
        }

        $conectar=parent::conexion();
        $sql="insert into ingreso values(null,?,?,?,now());";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["idpersona"]);
        $sql->bindValue(2, $_POST["tipo_comprobante"]);
        $sql->bindValue(3, $_POST["num_comprobante"]);

        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        //LA PARTE PARA INGRESAR LOS ARTICULOS



     $idarticulo=$_POST['idarticulo'];
     $cantida=$_POST['cantida'];
     $precio_compra=$_POST['precio_compra'];
     $precio_venta=$_POST['precio_venta'];


     $cont=0; // para ir recorriendo el vector

     $var='1';
  // recorro con un cilo while miestras el contador sea menor al tamaño de idarticulo
     while($cont<count($idarticulo)){

       $conectar=parent::conexion();
        $sql="insert into detalle_ingreso values(null,?,?,?,?,?);";

        $sql=$conectar->prepare($sql);



         $sql->bindValue(1, $idarticulo[$cont]);
         $sql->bindValue(2, $var);
         $sql->bindValue(3, $cantida[$cont]);
         $sql->bindValue(4, $precio_compra[$cont]);
         $sql->bindValue(5, $precio_venta[$cont]);


        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        $cont=$cont+1;
        }
         header("Location:".Conectar::ruta()."AgregarIngreso.php?m=2");
        exit();

      }





                     //******************************************************************************************************************
      //******************************************************************************************************************

            //FUNCIONES DE LA ENTIDAD FACTURAR PRODUCTO
      //******************************************************************************************************************
      //******************************************************************************************************************

           public function AgregarFactura(){
          $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["idpersona"]) or empty($_POST["tipo_comprobante"]) or empty($_POST["num_comprobante"])){

            header("Location:".Conectar::ruta()."Facturar.php?m=1");
           exit();
        }

        $conectar=parent::conexion();
        $sql="insert into venta values(null,?,?,?,now());";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["idpersona"]);
        $sql->bindValue(2, $_POST["tipo_comprobante"]);
        $sql->bindValue(3, $_POST["num_comprobante"]);

        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        //LA PARTE PARA INGRESAR LOS ARTICULOS



     $idarticulo=$_POST['idarticulo'];
     $cantida=$_POST['cantida'];
     $precio_venta=$_POST['precio_venta'];


     $cont=0; // para ir recorriendo el vector

     $var='1';
  // recorro con un cilo while miestras el contador sea menor al tamaño de idarticulo
     while($cont<count($idarticulo)){

       $conectar=parent::conexion();
        $sql="insert into detalledeventas values(null,?,?,?,?);";

        $sql=$conectar->prepare($sql);



         $sql->bindValue(1, $idarticulo[$cont]);
         $sql->bindValue(2, $var);
         $sql->bindValue(3, $cantida[$cont]);
         $sql->bindValue(4, $precio_venta[$cont]);


        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        $cont=$cont+1;
        }

                header("Location:".Conectar::ruta()."Facturar.php?m=2");
        exit();

      }




      }


?>