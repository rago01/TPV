<?php
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="active">
                <a href="inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <?php
             $perfil = $_SESSION['AUT']['id_perfil'];
          $sql="SELECT m.titulo,modulo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
            WHERE p.id_perfil = $perfil ";
            $consulta=Conexion::conectar()->prepare($sql);
            $consulta->execute();
            while ($perfil = $consulta->fetch()) {
              echo '<li>
                  <a href="'.$perfil['modulo'].'">
                      <i class="fa fa-circle"></i>
                      <span>'.$perfil['titulo'].'</span>
                  </a>
              </li>';

            }
            ?>
       <!--
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>Productos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="categorias">
                            <i class="fa fa-circle-o"></i>
                            <span>Categorias</span>
                        </a>
                    </li>
                    <li>
                        <a href="productos">
                            <i class="fa fa-circle-o"></i>
                            <span>Producto</span>
                        </a>
                    </li>
                    <li>
                        <a href="movimientos">
                            <i class="fa fa-circle-o"></i>
                            <span>Movimientos inventario</span>
                        </a>
                    </li>
                    <li>
                        <a href="proveedores">
                            <i class="fa fa-circle-o"></i>
                            <span>Proveedores</span>
                        </a>
                    </li>
                    <li>
                        <a href="ingredientes">
                            <i class="fa fa-circle-o"></i>
                            <span>Ingredientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="unidades">
                            <i class="fa fa-circle-o"></i>
                            <span>Unidades</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="reportes">
                    <i class="fa fa-dashboard"></i>
                    <span>Reportes</span>
                </a>
            </li> -->
        </ul>
    </section>
</aside>
