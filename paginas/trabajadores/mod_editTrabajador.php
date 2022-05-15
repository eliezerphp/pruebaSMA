
<div class="modal fade modaleditarTrabajador" id="modaledittrabajador" tabindex="-1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar trabajador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" id="frmedittrabajadores" method="POST" > 
            <div class="modal-body">
              <input type="text" name="txtaccion" id="txtaccion" value="2" hidden>
              <input type="text" name="hidden_trabajador_id" id="hidden_trabajador_id" hidden>

              <input type="text" name="txtEnombres" id="txtEnombres" class="form-control"  placeholder="Nombres" autocomplete="off">
              <br>
              <input type="text" name="txtEapellidos" id="txtEapellidos" class="form-control" placeholder="Apellidos" autocomplete="off">
              <br>
              <div>
                <select name="cbEarea" id="cbEarea" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtareas->listarAreas() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
                <br>
                <select name="cbEpuesto" id="cbEpuesto" class="form-control" data-width="100%">
                  <!-- <option value="0">Seleccione el puesto.</option> -->
                  <option value=""></option>
                  <?php foreach($dtpuestos->listarPuestos() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onclick="actualizarTrabajador()" id="btneditar">Guardar trabajador</button>
            </div>
            </form>
          </div>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <script>
      $('#cbEarea').select2({
        placeholder: "Seleccione área...",
        allowClear: true
       });
       $('#cbEpuesto').select2({
        //allowClear: true,
        placeholder: "Seleccione puesto...",
        allowClear: true
       });

      // $(".select2-selection__placeholder").text('Seleccione...')

      $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
      });
      
      </script>