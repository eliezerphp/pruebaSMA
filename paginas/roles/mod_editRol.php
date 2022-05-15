<!-- MODAL -->
<?php

/*

include('../../entidades/Categorias.php');
include('../../datos/Dt_categorias.php');

$dtcat = new DTCategorias();

$catEdit;
$varIdCat = $_GET['idEmp'];
$catEdit = $dtcat->obtenerEmp($varIdCat); 

*/
?>
<div class="modal fade modaleditarRol" id="modaleditrol" tabindex="-1">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar rol</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" id="frmeditroles" method="POST" > 
            <div class="modal-body">
              <input type="text" name="hidden_rol_id" id="hidden_rol_id" hidden>
              <input type="text" name="txtEdescripcion" id="txtEdescripcion" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onclick="actualizarRol()" id="btneditar">Guardar rol</button>
            </div>    
            </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>

</script>