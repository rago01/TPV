<?php

class ControladorProveedores{

//Mostrar los proveedores
  static public function ctrMostrarProveedores($item, $valor){
      $tabla = "proveedores";
      $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item,$valor);
      return $respuesta;
  }

//Crear proveedores
  static public function ctrCrearProveedor(){
    if (isset($_POST["nuevoProveedor"])) {
          $tabla = "proveedores";


          $contaco_directo = $_POST["nom_contacto"].' - '.$_POST["tel_contacto"];

          $datos = array('resp_user' => $_SESSION["id_user"],
                         'nombre' => $_POST["nuevoProveedor"],
                         'tipo_doc' => $_POST["tipo_doc"],
                         'doc' => $_POST["doc"],
                         'email' => $_POST["email"],
                         'telefono' => $_POST["telefono"],
                         'direccion' => $_POST["direccion"],
                         'contacto' => $contaco_directo);
                         var_dump($datos);
          $respuesta = ModeloProveedores::mdlCrearProveedor($tabla, $datos);
          var_dump($respuesta);
          if ($respuesta == "ok") {
            echo'
            <script>
                  swal({
                   type: "success",
                   title: "Proveedor Resgistrado",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar"
                        }).then(function(result){
                   if(result.value){
                     window.location = "proveedores";
                   }
                  });
            </script>';
          }
     }
  }


}




 ?>
