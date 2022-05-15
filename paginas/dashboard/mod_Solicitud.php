<?php
//session_start();

?>
<!-- MODAL -->
<div class="modal fade modalinsertarSolicitud" id="modalsolicitud">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Generar Solicitud</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="frmsolicitudes" method="POST">
            <div class="modal-body">
              <input type="text" name="txtaccion" id="txtaccion" value="1" hidden>
              <input type="text" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>" hidden>

              <div class="row">
                <div class="col-md-6 mb-2">
                <select name="cbtrabajador" id="cbtrabajador" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dttrabajadores->listarTrabajadores() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('nombres');?><?php echo ' '.$r->__GET('apellidos'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
              
                <div class="col-md-6 mb-2">
                <select name="cbturno" id="cbturno" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtturnos->listarTurnos() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>

                <div class="col-md-6 mb-2">
                <select name="cbaula" id="cbaula" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtaulas->listarAulas() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>

                <div class="col-md-6 mb-2">
                <select name="cbasignaturas" id="cbasignaturas" class="form-control" data-width="100%">
                <option value=""></option>
                  <?php foreach($dtasignaturas->listarAsignaturas() as $r): ?>
                    <option value="<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></option>
                  <?php endforeach; ?>
                </select>
                </div>

                <div id="select_bloques" class="col-md-6">
                  <select name="cbbloques" id="cbbloques" class="form-control" data-width="100%">
                      <option value=""></option>
                  </select>
                </div>

                <div class="col-md-6 col-xs-3 mb-2">
                <label for="fecha_prestamo">Fecha</label>
                  <input type="text" name="fecha_prestamo" id="fecha_prestamo" >
                </div>

                <?php foreach($dtmedios->listarMedios() as $r): ?>
                  <div class="col-md-3">
                  <input class="medios" type="checkbox" name="medios[]" id="medios<?php echo $r->__GET('id'); ?>" value="<?php echo $r->__GET('id'); ?>"> 
                  <label for="medios<?php echo $r->__GET('id'); ?>"><?php echo $r->__GET('descripcion'); ?></label> 
                </div>
                <?php endforeach; ?>

                <div class="col-md-12 col-xs-3 mb-2">
                  <label for="TAobservaciones"><h4>Observaciones y especificaciones:</h4></label>
                  <textarea class="form-control" name="TAobservaciones" id="TAobservaciones" cols="30" rows="5" ></textarea>
                </div>
              </div>
              <!-- <input type="text" name="txtdescripcion" id="txtdescripcion" class="form-control" placeholder="Descripción" autocomplete="off"> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="btnguardar">Realizar solicitud</button>
            </div>    
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalsolicitud"><i
            class="fas fa-list fa-sm text-white-50"></i> Generar solicitud.</button>

            <script>

      var turno;

      $('#cbtrabajador').select2({
        placeholder: "¿Quien solicita?.",
        allowClear: true
       });
       $('#cbturno').select2({
        //allowClear: true,
        placeholder: "Seleccione Turno.",
        allowClear: true
       });

       $('#cbaula').select2({
        //allowClear: true,
        placeholder: "Seleccione Aula.",
        allowClear: true
       });

       $('#cbasignaturas').select2({
        //allowClear: true,
        placeholder: "Seleccione Asignatura.",
        allowClear: true
       });

       $('#cbbloques').select2({
        //allowClear: true,
        placeholder: "Seleccione Bloque.",
        allowClear: true
       });

      // $(".select2-selection__placeholder").text('Seleccione...')

      $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
      });

      //Evento On change, select2
      $('#cbturno').on("change.select2", function (e) { 

      turno = $('#cbturno').val();
      $.post("paginas/dashboard/get_bloques.php", { turno: turno }, function(data){
          $("#cbbloques").html(data);
        });
      $('#cbturno').select2('close');
      hab_des();//llamar a funcion que deshabilita días
    });

    function hab_des(date){ // Funcion que deshabilita días.

      var day = date.getDay();

      if (turno == 1) {
        
        return [(day != 0 && day != 6), ''];

      } else if (turno == 2) {

        return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5), ''];

      } else if (turno == 3){

        return [(day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6), ''];

      } else {

        return [(day != 7), ''];;

      }
    }


    $("#fecha_prestamo").datepicker({

      beforeShowDay: hab_des,

      onSelect: function(dateText, inst) {  //////// dias anteriores a la fecha de HOY
      //Get today's date at midnight 
      var today = new Date(); 
      today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear()); 
      //Get the selected date (also at midnight) 
      var selDate = Date.parse(dateText); 

      if(selDate < today) { 
       //If the selected date was before today, continue to show the datepicker 
       $('#fecha_prestamo').val('');
       alert('Éste día ya ha pasado.');
       $(inst).datepicker('show'); 
      } 
     } 

    });


// CARGAR DATOS DE BLOQUES DEPENDIENDO DEL TURNO //
// $(document).ready(function(){
//     $("#cbturno").change(function(){
//       $("#cbturno option:selected").each(function(){
//         id_turno = $(this).val();
//         $.post("paginas/dashboard/get_bloques.php", { id_turno: id_turno }, function(data){
//           $("#cbbloques").html(data);
//         });
//       });
//     })
//   });
    
      
</script>