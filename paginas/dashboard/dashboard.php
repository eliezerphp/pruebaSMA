<?php session_start(); ?>

<?php
include('../../entidades/Trabajadores.php');
include('../../datos/Dt_trabajadores.php');

include('../../entidades/Aulas.php');
include('../../datos/Dt_aulas.php');

include('../../entidades/Turnos.php');
include('../../datos/Dt_turnos.php');

include('../../entidades/Asignaturas.php');
include('../../datos/Dt_asignaturas.php');

include('../../entidades/Medios.php');
include('../../datos/Dt_medios.php');

include('../../entidades/Bloques_turno.php');
include('../../datos/Dt_bloques_turno.php');

$dttrabajadores = new DTTrabajadores();
$dtaulas = new DTAulas();
$dtturnos = new DTTurnos();
$dtasignaturas = new DTAsignaturas();
$dtmedios = new DTMedios();
$dtbloques_turno = new DTBloques_turno();


?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="m-0"></h1>

<?php include 'mod_Solicitud.php'; ?>

</div>

<!-- Content Row -->
<div class="row justify-content-md-center">

    <div class="col-md-12 text-center mb-2">
    <h2 class="">Ver Tablas</h2>
    </div>

<!-- CONTENEDOR DE BOTONES -->
<div id="contenedorBtn" class="container-fluid"></div><!-- CIERRE CONTENEDOR BOTONES -->
 

<!-- TABLA -->
<div class="col-md-12" id="tablaSolicitud"></div>


</div>
</div>
<!-- /.container-fluid -->

<script src="paginas/Dashboard/scripts.js"></script>