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
          <?php  //INICIA MENU DE ADMINISTRACION ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i>
                <span> Administración </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <?php
                   $perfil = $_SESSION['id_perfil'];
                   $sql="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                         WHERE p.id_perfil = $perfil AND grupo = 'administracion'";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();
                  //var_dump($consulta);
                //  echo $consulta;
                if ($perfil == '1') {
                      while($perfil = $consulta->fetch()){

                          echo '<li>
                                    <a href="'.$perfil['modulo'].'">
                                        <i class="fa fa-cog"></i>
                                        <span>'.$perfil['titulo'].'</span>
                                    </a>
                                </li>
                              ';
                        }
                      }else{
                      echo '
                      <li>
                          <a href="#" class="alert alert-danger">
                            <i class="fa fa-close"></i>
                            <span>Acceso denegado.</span>
                          </a>
                      </li>';
                  }
                  ?>
              </ul>
            </li>
          <?php  //INICIA MENU DE VENTAS ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Ventas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <?php
                   $perfil = $_SESSION['id_perfil'];
                   $sql="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                         WHERE p.id_perfil = $perfil AND grupo in ('ventas')";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();


                  if ($perfil == '2' || $perfil == '3' || $perfil == '1') {
                        foreach($consulta as $key => $menu1) {
                    echo '<li>
                              <a href="'.$menu1['modulo'].'">
                                  <i class="fa fa-money"></i>
                                  <span>'.$menu1['titulo'].'</span>
                              </a>
                          </li>
                        ';

                      }
                }else{
                    echo '
                        <p class="alert alert-danger">
                          <i class="fa fa-close"></i>
                          <span>Acceso denegado.</span>
                        </p>';
                  }
                  ?>
              </ul>
            </li>
            <?php //INICIA MENU DE REPORTES ?>
           <li class="treeview">
              <a href="#">
                <i class="fa fa-area-chart"></i>
                <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <?php
                   $perfil = $_SESSION['id_perfil'];
                   $sql="SELECT m.titulo,modulo,grupo FROM menu m LEFT JOIN perfiles_menus p ON p.id_menu=m.id_menu
                         WHERE p.id_perfil = $perfil AND grupo in ('reportes')";
                  $consulta=Conexion::conectar()->prepare($sql);
                  $consulta->execute();


                  if ($perfil == '2' || $perfil == '3' || $perfil == '1') {
                        foreach($consulta as $key => $perfil) {
                    echo '<li>
                              <a href="'.$perfil['modulo'].'">
                                  <i class="fa  fa-file-pdf-o"></i>
                                  <span>'.$perfil['titulo'].'</span>
                              </a>
                          </li>
                        ';

                      }
                }else{
                    echo '
                    <li>
                        <a href="#"  class="alert alert-danger">
                          <i class="fa fa-close"></i>
                          <span>Acceso denegado.</span>
                        </a>
                    </li>';
                  }
                  ?>
              </ul>
            </li>
        </ul>
    </section>
</aside>
