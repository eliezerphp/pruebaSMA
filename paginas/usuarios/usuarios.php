<?php
include('../../entidades/Trabajadores.php');
include('../../datos/Dt_trabajadores.php');
include('../../entidades/Roles.php');
include('../../datos/Dt_roles.php');

$dttrabajadores = new DTTrabajadores();
$dtroles = new DTRoles();

?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
      <!-- MODAL Y BOTON -->
      <?php require_once 'mod_Usuario.php'; ?>

      <?php include 'mod_editUsuario.php'; ?>


      <!-- TABLA -->
      <div id="tablaUsuario"></div>
         
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">

        
    </script>

<script src="paginas/usuarios/scripts.js"></script>