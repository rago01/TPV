<?php

class ControladorUsuarios{

  static public function ctrIngresoUsuario(){
        if (isset($_POST["user"])){
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) &&
          preg_match('/^[a-zA-Z0-9]+$/', $_POST['clave1'])) {
             $encriptar = crypt($_POST["clave1"], '$6$rounds=5000$usesomesillystringforsalt$');
             echo $tabla = "users";
             echo $item = "doc";
             echo $valor = $_POST['user'];
             $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
            // echo $respuesta["clave"].'<br>';
             //echo $encriptar.'<br>';
             //echo $respuesta['doc'];
             //echo $_POST["user"];
             var_dump($respuesta);
              if($respuesta["doc"] == $_POST["user"] && $respuesta["clave"] == $encriptar ){

                    if ($respuesta['estado_user'] == 1) {

                      $_SESSION['iniciarSesion'] = "ok";
                      $_SESSION['id_user'] = $respuesta['id_user'];
                      $_SESSION['nombres'] = $respuesta['nombres'];
                      $_SESSION['apellidos'] = $respuesta['apellidos'];
                      $_SESSION['t_doc'] = $respuesta['t_doc'];
                      $_SESSION['doc'] = $respuesta['doc'];
                      $_SESSION['email'] = $respuesta['email'];
                      $_SESSION['celular'] = $respuesta['celular'];
                      $_SESSION['direccion'] = $respuesta['direccion'];
                      $_SESSION['ultimo_login'] = $respuesta['ultimo_login'];
                      $_SESSION['id_perfil'] = $respuesta['id_perfil'];

                      date_default_timezone_set('America/Bogota');
                      $fecha = date('Y-m-d');
						          $hora = date('H:i:s');

                      $fechaActual = $fecha.' '.$hora;

                      $item1 = "ultimo_login";
                      $valor1 = $fechaActual;

                      $item2 = "id_user";
                      $valor2 = $respuesta['id_user'];

                      $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

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
          }else{
            echo "Preg Match erroneo";
          }
        }
    }


    static public function ctrCrearUsuario(){
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

                       window.location = "usuarios";

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

                      window.location = "usuarios";

                    }
                 });
             </script>';
           }
         }
       }


       //_______MOSTRAR USUARIOS

       static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "users";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
       }



       //________EDITAR USUARIO

      static public function ctrEditarUsuario(){
         if (isset($_POST['newDoc'])) {
           if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newNombres"])){

             $tabla = "users";
             if($_POST['clave1'] != ''){
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['clave1'])) {
                  $encriptar = crypt($_POST["clave1"], '$6$rounds=5000$usesomesillystringforsalt$');
                }else {
                  echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';
                }
           }else {
           $encriptar = $_POST['passwordActual'];
         }

           $datos = array('id_user' => $_POST['id_user'],
                          'perfil' => $_POST['newPerfil'],
                          'nombres' => $_POST['newNombres'],
                          'apellidos' => $_POST['newApellidos'],
                          't_doc' => $_POST['newT_doc'],
                          'doc' => $_POST['newDoc'],
                          'email' => $_POST['newEmail'],
                          'direccion' => $_POST['newDireccion'],
                          'celular' => $_POST['newCelular'],
                          'clave' => $encriptar);
                          echo '<br> ' .var_dump($datos);

                            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
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
