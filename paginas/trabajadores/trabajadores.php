<?php
include('../../entidades/Areas.php');
include('../../datos/Dt_areas.php');
include('../../entidades/Puestos.php');
include('../../datos/Dt_puestos.php');

$dtareas = new DTAreas();
$dtpuestos = new DTPuestos();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trabajadores</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
      <!-- MODAL Y BOTON -->
      <?php require_once 'mod_Trabajador.php'; ?>

      <?php include 'mod_editTrabajador.php'; ?>


      <!-- TABLA -->
      <div id="tablaTrabajador"></div>
         
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">

        
    </script>

<script src="paginas/Trabajadores/scripts.js"></script>