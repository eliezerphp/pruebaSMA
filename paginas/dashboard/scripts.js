
// INSERTAR CATEGORIA, MODAL //
//var refreshS;

$('#btnguardar').click(function(){
  
  var datos=$('#frmsolicitudes').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_solicitudes.php",
        data:datos,
    success:function(r){
    if(r==1){

      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Aún faltan campos para llenar.',
        showConfirmButton: false,
        timer: 2000
        });
          

    }else{

      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Solicitud generada correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        if($('#cbturno').val() == 1)
        {
          cargaTabladiurno();

        } else if ($('#cbturno').val() == 2){

          cargaTablasabatino();

        } else if ($('#cbturno').val() == 3){

          cargaTabladominical();

        }
          $('.medios').prop('checked', false);
          $('#medios1').prop('checked', true);
          $('#medios2').prop('checked', true); 
          $('#TAobservaciones').val('');
          $('#modalsolicitud').modal('toggle'); 
          $('#cbaula').val('').trigger('change.select2');
          $('#cbasignaturas').val('').trigger('change.select2');
          $('#fecha_prestamo').val('');
          $('#hora_inicio').val('');
          $('#hora_entrega').val('');
          $('#cbtrabajador').val('').trigger('change.select2');
          $('#cbturno').val('').trigger('change.select2');

          // alert (
          //   'fecha_prestamo: ' + $('#fecha_prestamo').val() + 
          //   '\n hora_inicio: ' + $('#hora_inicio').val() + 
          //   '\n hora_entrega: ' + $('#hora_entrega').val() +
          //   '\n cbtrabajador: ' + $('#cbtrabajador').val() + 
          //   '\n cbturno: ' + $('#cbturno').val() + 
          //   '\n cbaula: ' + $('#cbaula').val() + 
          //   '\n cbasignaturas: ' + $('#cbasignaturas').val()
          //   );
        
        
        
        }
    }
    });

return false;


});


////////////////////////////////////////////////////////

// FUNCION PARA OBTENERID Y LLENAR CAMPOS EN MODAL EDITAR //
function obtenerId(id){

    $("#hidden_trabajador_id").val(id);
    //var txtaccion = 'obtener';
    $.post("negocios/obtenerTrabajador.php", {
            id: id
            //txtaccion: txtaccion
        },
        function (data, status) {
            // PARSE json data
            var trabajador = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_trabajador_id").val(trabajador.id);
            $("#txtEnombres").val(trabajador.nombres);
            $("#txtEapellidos").val(trabajador.apellidos);

            if(trabajador.id_area == null && trabajador.id_puesto == null){
              $('#cbEarea').val('').trigger('change.select2');
              $('#cbEpuesto').val('').trigger('change.select2');
            }else{
              $('#cbEarea').val(trabajador.id_area).trigger('change.select2');
              $('#cbEpuesto').val(trabajador.id_puesto).trigger('change.select2');
            }

            //$("#txtEdescripcion").val(data);
        });
        $("#modaledittrabajador").modal("show");
}

//////////////////////////////////////////////////////

// FUNCION PARA ACTUALIZAR UN REGISTRO MODAL EDITAR //
    
function actualizarTrabajador() {
    // get values
    var id_area = $("#cbEarea").val();
    var id_puesto = $("#cbEpuesto").val();
    var nombres = $("#txtEnombres").val();
    var apellidos = $("#txtEapellidos").val();

    var txtaccion = 2;

    // get hidden field value
    var id = $("#hidden_trabajador_id").val();

    // Update the details by requesting to the server using ajax
    $.post("negocios/Ng_trabajadores.php", {
            id: id,
            id_area: id_area,
            id_puesto: id_puesto,
            nombres: nombres,
            apellidos: apellidos,
            txtaccion: txtaccion
        },
        function (data, status) {
            // hide modal popup
            //toastr.success('Categoría editada correctamente.');
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'El registro ha sido editado correctamente.',
            showConfirmButton: false,
            timer: 1500
          });
            $("#modaledittrabajador").modal("hide");
            readRecords();
        }
    );
}

/////////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

  function estadoEnproceso(id, id_turno){
    //var id = $("#update_idcat").val();

    var txtaccion = 'Enproceso';
    var estado = 2;

    Swal.fire({ // SWEET ALERT
      title: 'Ya ha sido entregado el equipo?',
      text: "El estado pasará a EN PROCESO, no será posible revertirlo!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, ya lo entregué!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'El estado ha cambiado.',
            showConfirmButton: false,
            timer: 1500
        }),
        $.post("negocios/Ng_solicitudes.php", {
                id: id,
                txtaccion: txtaccion,
                estado: estado
            },
            function (data, status) {
                // reload Users by using readRecords();
               // readRecords();



               // DEPENDIENDO DEL TURNO, CARGARÄ LA TABLA CORRESPONDIENTE
               if(id_turno == 1)
               {
                 cargaTabladiurno();

               } else if(id_turno == 2){

                // refrescarSabatino();
                cargaTablasabatino();
                // setInterval(cargaTablasabatino, 1000);

               } else if(id_turno == 3) {

                cargaTabladominical();
                
               }
               
            }
        );
      }
    });


    }

////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

function estadoFinalizado(id, id_turno){
  //var id = $("#update_idcat").val();

  var txtaccion = 'Finalizado';
  var estado = 3;

  Swal.fire({ // SWEET ALERT
    title: 'Ya tienes el equipo?',
    text: "El estado pasará a FINALIZADO, no será posible revertirlo!",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, ya lo tengo!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'El estado ha cambiado.',
          showConfirmButton: false,
          timer: 1500
      }),
      $.post("negocios/Ng_solicitudes.php", {
          id: id,
          txtaccion: txtaccion,
          estado: estado
          },
          function (data, status) {
              // reload Users by using readRecords();
             // readRecords();
            //  cargaTablasabatino();
            //  setTimeout(cargaTablasabatino, 1000);
            if(id_turno == 1)
               {
                 cargaTabladiurno();

               } else if(id_turno == 2){

                // refrescarSabatino();
                cargaTablasabatino();
                // setInterval(cargaTablasabatino, 1000);

               } else if(id_turno == 3) {

                cargaTabladominical();
                
               }

          }
      );
    }
  });
  }

////////////////////////////////////////////////////

$(document).ready(function(){

  Btnrefresh();
  $('#medios1').prop('checked', true);
  $('#medios2').prop('checked', true);           
});

// FUNCION PARA CARGAR LA TABLA // 

// function readRecords() {
// $.get("paginas/dashboard/tbl_Solicitudes.php", {}, function (data, status) {
//     $("#tablaSolicitud").html(data);
// });
// }

//////////////// FUNCIONES SABATINO /////////////////



// function refrescarSabatino(){

  // refreshS += setTimeout(cargaTablasabatino, 1000);

  // refreshS = null;
// }

/*function cancelarIntervaloS(){

  clearTimeout(refreshS);

  refreshS = null;

}*/

function cargaTablasabatino(){
  $.get("paginas/dashboard/tbl_sabatino.php", {}, function (data, status) {
    $("#tablaSolicitud").html(data);
});

$('#btnsabatino').addClass('active');
$('#btndominical').removeClass('active');
$('#btndiurno').removeClass('active');

//refrescarSabatino();

//  setTimeout(cancelarIntervaloS, 2000);

 //clearTimeout();
//cancelarIntervaloS();


// clearInterval(refreshS);

// refreshS = null;

// cancelarIntervaloS();

}

//////////////////////////////////////

function cargaTabladiurno(){
  $.get("paginas/dashboard/tbl_diurno.php", {}, function (data, status) {
    $("#tablaSolicitud").html(data);
});
$('#btndiurno').addClass('active');
$('#btndominical').removeClass('active');
$('#btnsabatino').removeClass('active');
}
function cargaTabladominical(){
  
    $.get("paginas/dashboard/tbl_dominical.php", {}, function (data, status) {
      $("#tablaSolicitud").html(data);
  
  });
  
$('#btndominical').addClass('active');
$('#btndiurno').removeClass('active');
$('#btnsabatino').removeClass('active');
}

function Btnrefresh(){
  $.get("paginas/dashboard/btn_turnos.php", {}, function (data, status) {
    $("#contenedorBtn").html(data);
});
}

const intervalo = setInterval( Btnrefresh, 5000); //Temporizador que ejecuta el refresco cada 5 segundos

function detenerIntervalo(){ // para detener el intervalo
  clearInterval(intervalo);
}

////////////////////////////////////////////

// FUNCIONES PARA DATEPICKER //

// $('#cbturno').on("change", function (e) { 

//   var diurno = 1;
//   var sabado = 2;
//   var dominical = 3;

//   var turno = $('#cbturno').val();

//   if (turno== 1) {
    
//   } else if(turno == 2) {

//   } else if(turno == 3) {

//   }

// });

///////////////////////////////

///// FUNCION DE BLOQUEO DE DIAS EN DATE PICKER /////////

function noExcursion(date){
    var day = date.getDay();
  // aqui indicamos el numero correspondiente a los dias que ha de bloquearse (el 0 es Domingo, 1 Lunes, etc...) en el ejemplo bloqueo todos menos los lunes y jueves.
  return [(day != 0 && day != 2 && day != 3 && day != 5 && day != 6), ''];
  };

////////////////////