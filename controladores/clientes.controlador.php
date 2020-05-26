<?php


class ControladorClientes{


  static public function ctrIngresoCliente(){
        if (isset($_POST["userClient"])){
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['userClient'])) {
             $tabla = "clientes";
             $item = "celular";
             $valor = $_POST['userClient'];
             $respuesta = ModeloClientes::mdlMostrarClientes($tabla,$item,$valor);
            // echo $respuesta["clave"].'<br>';
             //echo $encriptar.'<br>';
             //echo $respuesta['doc'];
             //echo $_POST["user"];
             var_dump($respuesta);
              if(isset($respuesta["celular"]) && $respuesta["celular"] == $_POST["userClient"]){

                    if ($respuesta['celular'] != '') {

                      $_SESSION['iniciarSesion'] = "ok";

                      $_SESSION['id_perfil'] = $respuesta['id_perfil'];
                      $_SESSION['id_cliente'] = $respuesta['id_cliente'];
                      $_SESSION['nombres'] = $respuesta['nombres'];
                      $_SESSION['apellidos'] = $respuesta['apellidos'];
                      $_SESSION['email'] = $respuesta['email'];
                      $_SESSION['celular'] = $respuesta['celular'];
                      $_SESSION['direccion'] = $respuesta['direccion'];
                      $_SESSION['ultimo_login'] = $respuesta['ultimo_login'];
                      $_SESSION['compras'] = $respuesta['compras'];

                      date_default_timezone_set('America/Bogota');
                      $fecha = date('Y-m-d');
                      $hora = date('H:i:s');

                      $fechaActual = $fecha.' '.$hora;

                      $item1 = "ultimo_login";
                      $valor1 = $fechaActual;

                      $item2 = "id_cliente";
                      $valor2 = $respuesta['id_cliente'];

                      $ultimoLogin = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

                      if ($ultimoLogin == "ok") {
                        echo '<script>
                                window.location = "inicio";
                              </script>';
                      }
                    }else{
                  echo '<br>
                    <div class="alert alert-danger">El usuario aún no está activado</div>';
                }
              }else{
                echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
            }
          }
        }
    }

  static public function ctrMostrarClientes($item, $valor){

   $tabla = "clientes";
   $respuesta = ModeloClientes::mdlMostrarClientes($tabla,$item,$valor);
   return $respuesta;

  }

  static public function ctrCrearCliente(){
    if (isset($_POST['celular'])) {
      if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nombres"]) &&
      preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["apellidos"])){

           $tabla = "clientes";

           $datos = array(
                          'perfil' => "4",
                          'nombres' => $_POST['nombres'],
                          'apellidos' => $_POST['apellidos'],
                          'direccion' => $_POST['direccion'],
                          'celular' => $_POST['celular'],
                          'email' => $_POST['email'],
                          'compras' => "0"
                          );
                          //echo '<br>' .var_dump($datos);
          $interfaz = $_POST["modulo_admin"];

          $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);


          if ($respuesta == "ok") {
            echo'
            <script>
                  swal({

                   type: "success",
                   title: "¡Gracias por registrarse en Brayan Pizzas!",
                   showConfirmButton: true,
                   confirmButtonText: "Cerrar"

                  }).then(function(result){

                   if(result.value){

                     window.location = "'.$interfaz.'";

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

                    window.location = "'.$interfaz.'";

                  }
               });
           </script>';
         }
       }
     }

     //________EDITAR USUARIO

    static public function ctrEditarCliente(){
       if (isset($_POST['newCel'])) {
         if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newNombres"])){

         $tabla = "clientes";
         $datos = array('id_user' => $_POST['id_user'],
                        'perfil' => "4",
                        'nombres' => $_POST['newNombres'],
                        'apellidos' => $_POST['newApellidos'],
                        'celular' => $_POST['newCelular'],
                        'email' => $_POST['newEmail'],
                        'direccion' => $_POST['newDireccion']);
                        echo '<br> ' .var_dump($datos);

                 $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
                          //echo '<br> <br>' .var_dump($respuesta);
                if ($respuesta == "ok") {
                  echo'
                  <script>
                        swal({

                         type: "success",
                         title: "¡El usuario ha sido editador correctamente!",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"

                        }).then(function(result){

                         if(result.value){

                           window.location = "usuarios";

                         }

                        });
                  </script>';
                }
       }else{

      echo'<script>

        swal({
            type: "error",
            title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if (result.value) {

            window.location = "usuarios";

            }
          })

        </script>';

         }
       }
   }




}



 ?>
