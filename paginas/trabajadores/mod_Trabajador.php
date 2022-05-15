<!-- MODAL -->
<div class="modal fade modalinsertarTrabajador" id="modaltrabajador">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar trabajador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="frmtrabajadores" method="POST">
            <div class="modal-body">
              <input type="text" name="txtaccion" id="txtaccion" value="1" hidden>
              <input type="text" name="txtnombres" id="txtnombres" class="form-control"  placeholder="Nombres" autocomplete="off">
              <br>
              <input type="text" name="txtapellidos" id="txtapellidos" class="form-control" placeholder="Apellidos" autocomplete="off">
              <br>
              <div>
                <select name="cbarea" id="cbarea" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtareas->listarAreas() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
                <br>
                <select name="cbpuesto" id="cbpuesto" class="form-control" data-width="100%">
                  <!-- <option value="0">Seleccione el puesto.</option> -->
                  <option value=""></option>
                  <?php foreach($dtpuestos->listarPuestos() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnguardar">Guardar trabajador</button>
            </div>    
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- BOTON -->
      <button type="button" style="color:#fff;" class="btn btn-app bg-success" data-toggle="modal" data-target="#modaltrabajador">
      <i class="fas fa-plus"></i> Trabajador
      </button>

      <script>
      $('#cbarea').select2({
        placeholder: "Seleccione área...",
        allowClear: true
       });
       $('#cbpuesto').select2({
        //allowClear: true,
        placeholder: "Seleccione puesto...",
        allowClear: true
       });

      // $(".select2-selection__placeholder").text('Seleccione...')

      $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
      });
      
      </script>