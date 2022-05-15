<?php 
  include('../../entidades/Trabajadores.php');
  include('../../datos/Dt_trabajadores.php');

  $datos_trabajadores = new DTTrabajadores();

  $data = '<table id="tbl_trabajadores" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>AREA</th>
            <th>PUESTO</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>';

	
          foreach($datos_trabajadores->listarTrabajadores() as $r)
    	{
    		$data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td>'. $r->__GET('nombres').'</td>
                        <td>'. $r->__GET('apellidos').'</td>
                        <td>'. $r->__GET('area').'</td>
                        <td>'. $r->__GET('puesto').'</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="obtenerId('. $r->__GET('id').')" data-toggle="modal" ><i class="fas fa-edit" title="Editar"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarTrabajador('.$r->__GET('id').')"><i class="fas fa-trash-alt" title="Eliminar"></i></button>
                        </td>
    		        </tr>';
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_trabajadores').DataTable({
  "order": [[ 1, "asc" ]]
});
</script>
