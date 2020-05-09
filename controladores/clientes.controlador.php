<?php


class ControladorClientes{

  static public function ctrMostrarClientes($item, $valor){

   $tabla = "users";
   $respuesta = ModeloClientes::mdlMostrarClientes($tabla,$item,$valor);
   return $respuesta;

  }

  static public function ctrCrearCliente(){
    if (isset($_POST['doc'])) {
      if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nombres"]) &&
      preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["apellidos"])){

          echo $tabla = "users";


           $encriptar = crypt($_POST["clave1"], '$6$rounds=5000$usesomesillystringforsalt$');

           $datos = array('id_user' => $_POST['id_user'],
                          'perfil' => $_POST['perfil'],
                          'nombres' => $_POST['nombres'],
                          'apellidos' => $_POST['apellidos'],
                          't_doc' => $_POST['t_doc'],
                          'doc' => $_POST['doc'],
                          'email' => $_POST['email'],
                          'direccion' => $_POST['direccion'],
                          'celular' => $_POST['celular'],
                          'clave' => $encriptar,
                          'estado_user' => "1");
                          //echo '<br>' .var_dump($datos);

          $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);


          if ($respuesta == "ok") {
            echo'
            <script>
                  swal({

                   type: "success",
                   title: "¡El usuario ha sido guardado correctamente!",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar"

                  }).then(function(result){

                   if(result.value){

                     window.location = "crear_venta";

                   }

                  });
            </script>';
          }

         }else{
           echo'
           <script>
               swal({
                type: "error",
                title: "¡Verifique la información ingresada",
                showConfirmButton: false,
                confirmButtonText: "Cerrar"
               }).then(function(result){
                  if(result.value){

                    window.location = "crear_venta";

                  }
               });
           </script>';
         }
       }
     }



}



 ?>
