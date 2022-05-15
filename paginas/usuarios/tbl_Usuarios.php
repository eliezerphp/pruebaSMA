<?php 
  include('../../entidades/Usuarios.php');
  include('../../datos/Dt_usuarios.php');

  $datos_usuarios = new DTUsuarios();

  $data = '<table id="tbl_usuarios" class="table table-hover">
            <thead>
            <th>ID</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>PERTENECE</th>
            <th>ROL</th>
            <th>ACCIONES</th>
          </thead>
          <tbody>';

	
          foreach($datos_usuarios->listarUsuarios() as $r)
    	{
    		$data .= '<tr>
                        <td>'. $r->__GET('id').'</td>
                        <td>'. $r->__GET('usuario').'</td>
                        <td>'. $r->__GET('contraseña').'</td>
                        <td>'. $r->__GET('trabajador').'</td>
                        <td>'. $r->__GET('rol').'</td>
                        <td>
                        <button class="btn btn-info btn-sm" onclick="obtenerId('. $r->__GET('id').')" data-toggle="modal" ><i class="fas fa-edit" title="Editar"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCat('.$r->__GET('id').')"><i class="fas fa-trash-alt" title="Eliminar"></i></button>
                        </td>
    		        </tr>';
    	}
    
    $data .= '</table>';

    echo $data;
?>

<script>
$('#tbl_usuarios').DataTable({
 // responsive: true;
});
</script>
