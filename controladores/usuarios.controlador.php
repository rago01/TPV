<?php

class ControladorUsuarios{

  static public function ctrIngresoUsuario(){
        if (isset($_POST["user"])){
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) && 
          preg_match('/^[a-zA-Z0-9]+$/', $_POST['clave1'])) {
             $tabla = "users";
             $item = "doc";
             $valor = $_POST['user'];
              $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

              
             //echo $respuesta["clave"].'<br>';
             //echo $_POST["clave1"];
             // echo var_dump($respuesta);
              if($respuesta["doc"] == $_POST["user"] && $respuesta["clave"] == $respuesta["clave"]){

                    if ($respuesta['estado_user'] == 1) {
                      $_SESSION['AUT'] = $respuesta;
                    }
      					echo '<script>

      						window.location = "inicio";

      					</script>';

      				}else{

      					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

      				}
          }
        }
    }


    static public function ctrCrearUsuario(){
      if (isset($_POST['doc'])) {
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombres"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidos"])){

            echo $tabla = "users";
            $claveA2="";
                if ($_POST["clave1"]==$_POST["clave2"]){
                  if ($_POST["clave1"]!=""){
                    $claveA2=$_POST["clave1"];
                  }
                }
             $datos = array('perfil' => $_POST['perfil'],
                            'nombres' => $_POST['nombres'],
                            'apellidos' => $_POST['apellidos'],
                            't_doc' => $_POST['t_doc'],
                            'doc' => $_POST['doc'],
                            'email' => $_POST['email'],
                            'direccion' => $_POST['direccion'],
                            'celular' => $_POST['celular'],
                            'clave' => $claveA2,
                            'estado_user' => "1");
                            echo '<br>' .var_dump($datos);

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

       static public function ctrMostrarUsuarios(){
        $tabla = "users";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;
       }
}

?>
