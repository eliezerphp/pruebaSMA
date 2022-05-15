<?php 
  include('../../entidades/Roles.php');
  include('../../datos/Dt_roles.php');

  $datos_roles = new DTRoles();

  $data = '<table id="tbl_roles" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>DESCRIPCIÓN</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>';

	
          foreach($datos_roles->listarRoles() as $r)
    	{
    		$data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td>'. $r->__GET('descripcion').'</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="obtenerId('. $r->__GET('id').')" data-toggle="modal" ><i class="fas fa-edit" title="Editar"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarRol('.$r->__GET('id').')"><i class="fas fa-trash-alt" title="Eliminar"></i></button>
                        </td>
    		        </tr>';
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_roles').DataTable({
 // responsive: true;
});
</script>
