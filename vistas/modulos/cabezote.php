<?php



?>

<header class="main-header">
    <a href="" class="logo">
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
            <span class="sr-only">Navigation</span>
        </a>
    <!--PERFIL DEL USUARIO-->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="vistas/img/usuarios/default/anonymous.png" class="user-image" alt="">
                    <span class="hidden-xs"><?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos']?></span>
                </a>
                <!--DROPDOWN TOGGLE-->
                <ul class="dropdown-menu">
                    <li class="user-body">
                        <div class="pull-right">
                            <a href="logout" class="btn btn-default btn-flat">Salir</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    </nav>
</header>