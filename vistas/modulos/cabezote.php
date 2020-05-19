<?php
if ($_SESSION['id_perfil'] == "1") {
    $tipoUsuario = "Administrador";
}
if ($_SESSION['id_perfil'] == "2") {
    $tipoUsuario = "Cajero";
}
if ($_SESSION['id_perfil'] == "3") {
    $tipoUsuario = "Mesero";
}
if ($_SESSION['id_perfil'] == "4") {
    $tipoUsuario = "Cliente";
}
if ($_SESSION['id_perfil'] == "5") {
    $tipoUsuario = "Cocinero";
}

?>

<header class="main-header">
    <a href="inicio" class="logo">
        <!-- Logo mini -->
        <span class="logo-mini">
            <label for="">BP</label>
        </span>
        <!-- Logo normal -->
        <span class="logo-lg">
            <label for="">BRAYAN PIZZAS</label>
        </span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
    <!--BOTON MENU HAMBURGUESA-->
        <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        </a>
    <!--PERFIL DEL USUARIO-->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="vistas/img/usuarios/default/anonymous.png" class="user-image" alt="User Image">
            <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?>
                <small><?php echo $tipoUsuario; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="mi_perfil" class="btn btn-default"><span> <i class="fa fa-user"></i> Profile</a>
              </div>
              <div class="pull-right">
                <a href="logout" class="btn btn-default btn-flat"> <span> <i class="fa fa-circle-o-notch"></i> </span> Salir</a>
              </div>
            </li>
          </ul>
        </li>
        </ul>
    </div>

    </nav>
</header>
