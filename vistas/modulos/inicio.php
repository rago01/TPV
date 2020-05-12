

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>
        Hola <?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos'] ?>, bienvenido a Brayan Pizzas!
      </h3>
    </section>


  </div>
  <?php
if ($_SESSION['id_perfil'] == '4') {

    include("vista_cliente.php");

    }

      ?>
