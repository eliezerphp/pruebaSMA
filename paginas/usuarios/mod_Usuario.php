<!-- MODAL -->
<div class="modal fade modalinsertarCat" id="modalusuario">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="frmusuarios" method="POST">
            <div class="modal-body">
              <input type="text" name="txtaccion" id="txtaccion" value="1" hidden>
              <input type="text" name="txtusuario" id="txtusuario" class="form-control" placeholder="Usuario" autocomplete="off">
              <br>
              <input type="password" name="txtcontraseña" id="txtcontraseña" class="form-control" placeholder="Contraseña" autocomplete="off">
              <br>
              <div>
                <select name="cbrol" id="cbrol" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtroles->listarRoles() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
                <br>
                <select name="cbtrabajador" id="cbtrabajador" class="form-control" data-width="100%">
                  <!-- <option value="0">Seleccione el puesto.</option> -->
                  <option value=""></option>
                  <?php foreach($dttrabajadores->listarTrabajadores() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('nombres'); ?><?php echo $r->__GET('apellidos'); ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnguardar">Guardar usuario</button>
            </div>    
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- BOTON -->
      <button type="button" style="color:#fff;" class="btn btn-app bg-success" data-toggle="modal" data-target="#modalusuario">
      <i class="fas fa-thumbs-up"></i> Usuarios
      </button>

      <script>
      $('#cbtrabajador').select2({
        placeholder: "Seleccione trabajador...",
        allowClear: true
       });
       $('#cbrol').select2({
        //allowClear: true,
        placeholder: "Seleccione rol...",
        allowClear: true
       });

      // $(".select2-selection__placeholder").text('Seleccione...')

      $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
      });
      
      </script>