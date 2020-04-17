<?php

class ControladorUsuarios{

    public function ctrIngresoUsuario(){
        if (isset($_POST["user"])){
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['clave'])) {
             $tabla = "users";
             $item = "doc";
             $valor = $_POST['user'];
              $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);

              echo var_dump($respuesta);
          }
        }
    }
}

?>
