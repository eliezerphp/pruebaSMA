<?php
include('../../entidades/Solicitudes.php');
include('../../datos/Dt_solicitudes.php');

$datos_solicitud = new DTSolicitudes();
date_default_timezone_set('America/Managua');

$hoy = date("d/m/Y");

$contador = 0;
?>
<!-- ROW DE BOTONES -->
<div class="row justify-content-md-center">

<div class="col-md-3 text-center">
<button onclick="cargaTabladiurno();" id="btndiurno" href="#" class="btn btn-lg btn-primary shadow-lg">
<i class="fas fa-list fa-sm text-white-50"></i> Diurno.
<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
<?php 
    foreach ($datos_solicitud->listarSolicitudes(1) as $r){

        if ($r->__GET('estado') != 3) { 

            $contador ++;
            
        } else {
            
        }

    };

    echo $contador;

    $contador =  0;
    ?>
</span>
        </button>
</div>

<div class="col-md-3 text-center">
<button onclick="cargaTablasabatino();" id="btnsabatino" href="#" class="btn btn-lg btn-primary shadow-lg m-auto">
<i class="fas fa-list fa-sm text-white-50"></i> Sabatino.
<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?php 
    foreach ($datos_solicitud->listarSolicitudes(2) as $r){
        if ($r->__GET('estado') != 3) {

            $contador ++;

        } else {
            
        }
    };

    echo $contador;

    $contador =  0;
    ?>
</span>
</button>
</div>

<div class="col-md-3 text-center">
<button  onclick="cargaTabladominical();" id="btndominical" href="#" class="btn btn-lg btn-primary shadow-lg mg-auto">
<i class="fas fa-list fa-sm text-white-50"></i> Dominical.
<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
<?php 
    foreach ($datos_solicitud->listarSolicitudes(3) as $r){
        if ($r->__GET('estado') != 3) {

            $contador ++;

        } else {

        }
    };

    echo $contador;

    $contador =  0;
    ?> 
</span>
</button>
 </div>

 </div> <!-- CIERRE ROW BOTONES -->