<?php
//include('../modelos/conexion.php');
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TPV</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!--Data Tables-->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="/css/master.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- PLUGINS JAVASCRIPT -->

    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- Data Table -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- sweet Alert 2-->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

    <!--CryptoJS-->
    <script src ="vistas/js/sha3.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->

<?php
if (isset($_SESSION['AUT']) && $_SESSION['AUT']['estado_user'] == '1') {
echo '<div class="wrapper">';
    include "modulos/cabezote.php";
    include "modulos/menu.php";
    if (isset($_GET["ruta"])){
        if ($_GET["ruta"]=="inicio" ||
            $_GET["ruta"]=="productos" ||
            $_GET["ruta"]=="ventas" ||
            $_GET["ruta"]=="crear_venta" ||
            $_GET["ruta"]=="usuarios" ||
            $_GET["ruta"]=="categorias_inventario" ||
            $_GET["ruta"]=="movimientos" ||
            $_GET["ruta"]=="proveedores" ||
            $_GET["ruta"]=="unidades" ||
            $_GET["ruta"]=="reportes" ||
            $_GET["ruta"]="logout"
          ) {
            include "modulos/".$_GET["ruta"].".php";
        }else{
          include "modulos/404.php";
        }
    }else{
      include "modulos/inicio.php";
    }
    include "modulos/footer.php";
 echo'</div>';
}else{
  include "modulos/login.php";
}
?>

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>

</body>
</html>
