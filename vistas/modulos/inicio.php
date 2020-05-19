<?php $perfil = $_SESSION['id_perfil']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        if ($perfil == 4) {
            echo '<h2>Hola! '.$_SESSION["nombres"].' <strong class="text-info">  ¿Que vas a pedir?</strong></h2>';
        }else {
            echo '<h2>Hola! '.$_SESSION["nombres"].' '.$_SESSION["apellidos"].'</h2>';
        }
       ?>
    </section>
    <section class="content">
      <?php
      if ($perfil == 1 || $perfil == 2 || $perfil == 3) {
        include("inicio/vista_admin.php");
      }
      if ($perfil == 4) {
        include("inicio/vista_cliente.php");
      }
      ?>
    </section>
</div>
