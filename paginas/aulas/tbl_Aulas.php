<?php 
  include('../../entidades/Aulas.php');
  include('../../datos/Dt_aulas.php');

  $datos_aulas = new DTAulas();

  $data = '<table id="tbl_aulas" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>DESCRIPCIÓN</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>';

	
          foreach($datos_aulas->listarAulas() as $r)
    	{
    		$data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td>'. $r->__GET('descripcion').'</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="obtenerId('. $r->__GET('id').')" data-toggle="modal" ><i class="fas fa-edit" title="Editar"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarAula('.$r->__GET('id').')"><i class="fas fa-trash-alt" title="Eliminar"></i></button>
                        </td>
    		        </tr>';
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_aulas').DataTable({
  "order": [[ 1, "asc" ]]
});
</script>
