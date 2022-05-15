<?php 
  include('../../entidades/Solicitudes.php');
  include('../../datos/Dt_solicitudes.php');

  include('../../entidades/Det_solicitudes.php');
  include('../../datos/Dt_det_solicitudes.php');

  $datos_solicitud = new DTSolicitudes();
  $datos_det_solicitud = new DTDet_solicitudes();

  $data = '<table id="tbl_solicitudes" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>FECHA</th>
            <th>BLOQUE</th>
            <th>HORA INICIO</th>
            <th>HORA ENTREGA</th>
            <th>MEDIOS</th>
            <th>DOCENTE</th>
            <th>AULA</th>
            <th>ASIGNATURA</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>';

	
          foreach($datos_solicitud->listarSolicitudes() as $r)
    	{

    		$data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td>'. $r->__GET('fecha').'</td>
                        <td> Bloque '. $r->__GET('bloque').'</td>
                        <td>'. $r->__GET('hora_inicio').'</td>
                        <td>'. $r->__GET('hora_entrega').'</td>
                        <td>';

                        foreach ($datos_det_solicitud->listarDetsolicitudes($r->__GET('id')) as $d) {
                
                          $data .=  '<b>| </b>'.$d->__GET('medio'). ' ';
          
                        }
                  $data .= '</td>
                        <td>'. $r->__GET('solicitante').'</td>
                        <td>'. $r->__GET('aula').'</td>
                        <td>'. $r->__GET('asignatura').'</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="obtenerId('. $r->__GET('id').')" data-toggle="modal" ><i class="fas fa-edit" title="Editar"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarsolicitud('.$r->__GET('id').')"><i class="fas fa-trash-alt" title="Eliminar"></i></button>
                        </td>
    		        </tr>';
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_solicitudes').DataTable({
 // responsive: true;
});
</script>
