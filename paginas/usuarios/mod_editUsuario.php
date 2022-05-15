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
<div class="modal fade modaleditarCat" id="modaleditusuario" tabindex="-1">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" id="frmeditusuarios" method="POST" > 
            <div class="modal-body">
              <input type="text" name="hidden_usuario_id" id="hidden_usuario_id" hidden>
              <input type="text" name="txtEusuario" id="txtEusuario" class="form-control" placeholder="Usuario" autocomplete="off">
              <br>
              <input type="password" name="txtEcontraseña" id="txtEcontraseña" class="form-control" placeholder="Contraseña" autocomplete="off">
              <br>
              <div>
                <select name="cbErol" id="cbErol" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtroles->listarRoles() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
                <br>
                <select name="cbEtrabajador" id="cbEtrabajador" class="form-control" data-width="100%">
                  <!-- <option value="0">Seleccione el puesto.</option> -->
                  <option value=""></option>
                  <?php foreach($dttrabajadores->listarTrabajadores() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('nombres'); ?><?php echo $r->__GET('apellidos'); ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onclick="actualizarUsuario()" id="btneditar">Guardar usuario</button>
            </div>    
            </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <script>
      $('#cbEtrabajador').select2({
        placeholder: "Seleccione trabajador...",
        allowClear: true
       });
       $('#cbErol').select2({
        //allowClear: true,
        placeholder: "Seleccione rol...",
        allowClear: true
       });

      // $(".select2-selection__placeholder").text('Seleccione...')

      $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
      });
      
      </script>