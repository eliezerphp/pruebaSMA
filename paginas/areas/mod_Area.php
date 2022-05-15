<!-- MODAL -->
<div class="modal fade modalinsertarArea" id="modalarea">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Área</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="frmareas" method="POST">
            <div class="modal-body">
              <input type="text" name="txtaccion" id="txtaccion" value="1" hidden>
              <input type="text" name="txtdescripcion" id="txtdescripcion" class="form-control" placeholder="Descripción" autocomplete="off">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnguardar">Guardar área</button>
            </div>    
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-- BOTON -->
      <button type="button" style="color:#fff;" class="btn btn-app bg-success" data-toggle="modal" data-target="#modalarea">
      <i class="fas fa-plus"></i> Áreas
      </button>