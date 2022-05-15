<?php 

session_start();

  include('../../entidades/Solicitudes.php');
  include('../../datos/Dt_solicitudes.php');

  include('../../entidades/Det_solicitudes.php');
  include('../../datos/Dt_det_solicitudes.php');

  $datos_solicitud = new DTSolicitudes();
  $datos_det_solicitud = new DTDet_solicitudes();

  date_default_timezone_set('America/Managua');

  $hoy = date("d/m/Y");

  $data = '
  <br>
  <div class="col-md-12 text-center mb-2">
    <h2 class="">Tabla turno dominical</h2>
  </div>
  <table id="tbl_solicitudes" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>BLOQUE</th>
            <th>FECHA</th>
            <th>MEDIOS</th>
            <th>DOCENTE</th>
            <th>AULA</th>
            <th>ASIGNATURA</th>
            <th>OBSERVACIONES</th>
            <th>ESTADO</th>';

            if ($_SESSION['rol'] == 'Administrador') {
              $data .= '<th>ACCIONES</th>';
            }

            $data .= '
          </thead>
          <tbody>';

	
          foreach($datos_solicitud->listarSolicitudes(3) as $r)
    	{

        //$dia = date("L", $r->__GET('fecha'));

        if ($r->__GET('estado') != 3) {
          $data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td> Bloque '. $r->__GET('bloque').' <br> '.$r->__GET('hora_inicio').' - '.$r->__GET('hora_final').'</td>
                        <td>'.$r->__GET('fecha').'</td>
                        <td>';

                        foreach ($datos_det_solicitud->listarDetsolicitudes($r->__GET('id')) as $d) {
                
                          $data .= $d->__GET('medio'). ' ';
          
                        }

                  $data .= '</td>
                        <td>'. $r->__GET('solicitante').'</td>
                        <td>'. $r->__GET('aula').'</td>
                        <td>'. $r->__GET('asignatura').'</td>
                        <td>'. $r->__GET('observaciones').'</td>
                        <td>';

                        if($r->__GET('estado') == 1){

                          $data.= '
                          <span class="badge bg-secondary rounded-pill text-white">Pendiente</span>
                        </td>';

                        } elseif($r->__GET('estado') == 2){

                          $data.= '
                          <span class="badge bg-success rounded-pill text-white">En proceso</span>
                        </td>';

                        } elseif($r->__GET('estado') == 3){

                          $data.= '
                          <span class="badge bg-danger rounded-pill text-white">Finalizado</span>
                        </td>';

                        }

                    if ($_SESSION['rol'] == 'Administrador') {

                      if($r->__GET('estado') == 1){

                        $data .= '<td>
                        <button class="btn btn-success btn-sm" id="btnproceso'.$r->__GET('id').'" onclick="estadoEnproceso('.$r->__GET('id').', '.$r->__GET('id_turno').');" title="En proceso"><i class="fa fa-check"></i></button>
                        <button class="btn btn-secondary btn-sm" id="btnfinalizado" title="Finalizado" disabled><i class="far fa-thumbs-up" ></i></button>
                        </td>';

                      } elseif ($r->__GET('estado') == 2) {
                        $data .= '<td>
                        <button class="btn btn-secondary btn-sm"  title="En proceso" disabled><i class="fa fa-check"></i></button>
                        <button class="btn btn-primary btn-sm" id="btnfinalizado" id="btnfinalizado" onclick="estadoFinalizado('.$r->__GET('id').', '.$r->__GET('id_turno').');" title="Finalizado"><i class="far fa-thumbs-up" disabled></i></button>
                        </td>';
                      } else {
                        $data .= '<td>
                      <button class="btn btn-secondary btn-sm" disabled id="btnproceso" title="En proceso"><i class="fa fa-check"></i></button>
                      <button class="btn btn-secondary btn-sm" disabled id="btnfinalizado" title="Finalizado"><i class="far fa-thumbs-up"></i></button>
                      
                      </td>';
                      }
                      

                    }
               
                    $data .= '</tr>';
        } else {
          
        }

    		
                  
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_solicitudes').DataTable({
  responsive : true,
  "order": [[ 1, "asc" ]]
});
</script>
