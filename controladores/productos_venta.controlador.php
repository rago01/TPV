<?php

class ControladorProductosVenta{

  /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductoVenta($item, $valor, $orden){

		$tabla = "productos_venta";
		$respuesta = ModeloProductosVenta::mdlMostrarProductosVenta($tabla, $item, $valor, $orden);
		return $respuesta;

	}

	/*=============================================
	CREAR PRODUCTOS
	=============================================*/

  static public function ctrCrearProductoVenta(){

  if(isset($_POST["descripcion_producto"])){
    if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion_producto"]) &&
       preg_match('/^[0-9.]+$/', $_POST["precio_venta"])){
	        /*=============================================
	      VALIDAR IMAGEN
	      =============================================*/
				$ruta = "vistas/img/productos/default/anonymous.png";
				//var_dump($_FILES);
        if(isset($_FILES["nuevaImagen"]["tmp_name"])){
        list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
        $nuevoAncho = 500;
        $nuevoAlto = 500;
        /*=============================================
        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
        =============================================*/
        if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){
          /*=============================================
          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
          =============================================*/
          $aleatorio = mt_rand(100,999);
          $ruta = "vistas/img/productos/".$_POST["nombre_producto"].".jpg";
          $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
          imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
          imagejpeg($destino, $ruta);

        }

        if($_FILES["nuevaImagen"]["type"] == "image/png"){
          /*=============================================
          GUARDAMOS LA IMAGEN EN EL DIRECTORIO
          =============================================*/
          $aleatorio = mt_rand(100,999);
          $ruta = "vistas/img/productos/".$_POST["nombre_producto"].".png";
          $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
          imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
          imagepng($destino, $ruta);
        }
      }

      $tabla = "productos_venta";

      $datos = array(
							 "id_categoria" => $_POST["categoria"],
               "nombre_producto" => $_POST["nombre_producto"],
               "descripcion_producto" => $_POST["descripcion_producto"],
               "precio_venta" => $_POST["precio_venta"],
               "imagen" => $ruta);
			var_dump($datos);
      $respuesta = ModeloProductosVenta::mdlIngresarProductoVenta($tabla, $datos);
			var_dump($respuesta);
      if($respuesta == "ok"){

        echo'<script>
          swal({
              type: "success",
              title: "El producto ha sido guardado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                  if (result.value) {
                  window.location = "productos";
                  }
                })
          </script>';
      }
    }else{
      echo'<script>
        swal({
            type: "error",
            title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
            }).then(function(result){
            if (result.value) {
            window.location = "productos";
            }
          })
        </script>';
    }
  }
}

/*=============================================
EDITAR PRODUCTO
=============================================*/

static public function ctrEditarProductoVenta(){

	if(isset($_POST["editar_nombre_producto"])){

				/*=============================================
			VALIDAR IMAGEN
			=============================================*/

				$ruta = "vistas/img/productos/default/anonymous.png";

				if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){
					unlink($_POST["imagenActual"]);
				}else{
					mkdir($directorio, 0755);
				}

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["editarImagen"]["type"] == "image/jpeg"){
					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/
					$aleatorio = mt_rand(100,999);
					$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";
					$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				}

				if($_FILES["editarImagen"]["type"] == "image/png"){
					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/
					$aleatorio = mt_rand(100,999);
					$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";
					$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}
			}

			$tabla = "productos_venta";

			$datos = array(
						 	 "id_producto" => $_POST["id_producto"],
							 "id_categoria" => $_POST["editar_categoria"],
						 	 "nombre_producto" => $_POST['editar_nombre_producto'],
							 "descripcion" => $_POST["editar_descripcion_producto"],
							 "imagen" => $ruta,
							 "precio_venta" => $_POST["editar_precio_venta"]
							 );
							 VAR_DUMP($datos);
			$respuesta = ModeloProductosVenta::mdlEditarProductoVenta($tabla, $datos);
			var_dump($respuesta);
			if($respuesta == "ok"){

				echo'<script>

					swal({
							type: "success",
							title: "El producto ha sido editado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';

			}


	}

}

/*=============================================
BORRAR CATEGORIA
=============================================*/
static public function ctrBorrarCategoria(){

	if(isset($_GET["id_producto"])){

		$tabla ="productos_venta";
		$datos = $_GET["id_producto"];

		$respuesta = ModeloProductosVenta::mdlBorrarProducto($tabla, $datos);
		//var_dump($respuesta);
		if($respuesta == "ok"){

			echo'<script>
				swal({
						type: "success",
						title: "El producto ha sido eliminado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								if (result.value) {
								window.location = "productos";

								}
							})
				</script>';
		}
	}

}
/*=============================================
MOSTRAR SUMA VENTAS
=============================================*/

static public function ctrMostrarSumaVentas(){

	$tabla = "productos_venta";

	$respuesta = ModeloProductosVenta::mdlMostrarSumaVentas($tabla);

	return $respuesta;

}


}








 ?>
