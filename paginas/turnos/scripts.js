
// INSERTAR CATEGORIA, MODAL //

$('#btnguardar').click(function(){

    var datos=$('#frmturnos').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_turnos.php",
        data:datos,
    success:function(r){
    if(r==1){

      alert("Fallo el server");

    }else{
      //toastr.success('Categoría agregada correctamente.');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Turno agregado correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        $('#tablaTurno').load('paginas/Turnos/tbl_turnos.php');
        $('#txtdescripcion').val('');
        $('.modalinsertarTurno').modal('toggle'); 
        
        }
    }
    });

return false;
});

////////////////////////////////////////////////////////

// FUNCION PARA OBTENERID Y LLENAR CAMPOS EN MODAL EDITAR //
function obtenerId(id){

    $("#hidden_turno_id").val(id);
    //var txtaccion = 'obtener';
    $.post("negocios/obtenerTurno.php", {
            id: id
            //txtaccion: txtaccion
        },
        function (data, status) {
            // PARSE json data
            var turno = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_turno_id").val(turno.id);
            $("#txtEdescripcion").val(turno.descripcion);
            //$("#txtEdescripcion").val(data);
        });
        $("#modaleditturno").modal("show");
}

//////////////////////////////////////////////////////

// FUNCION PARA ACTUALIZAR UN REGISTRO MODAL EDITAR //
    
function actualizarTurno() {
    // get values
    var descripcion = $("#txtEdescripcion").val();
    var txtaccion = 2;

    // get hidden field value
    var id = $("#hidden_turno_id").val();

    // Update the details by requesting to the server using ajax
    $.post("negocios/Ng_turnos.php", {
            id: id,
            descripcion: descripcion,
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
            $("#modaleditturno").modal("hide");
            readRecords();
        }
    );
}

/////////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

  function eliminarTurno(id){
    //var id = $("#update_idcat").val();

    var txtaccion = 'Eliminar';

    Swal.fire({ // SWEET ALERT
      title: 'Está seguro de eliminar?',
      text: "No será posible revertirlo!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, eliminarlo!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'El registro ha sido eliminado.',
            showConfirmButton: false,
            timer: 1500
        }),
        $.post("negocios/Ng_turnos.php", {
                id: id,
                txtaccion: txtaccion
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
      }
    });
    }

////////////////////////////////////////////////////

$(document).ready(function(){

        readRecords();
               
});
// FUNCION PARA CARGAR LA TABLA // 

function readRecords() {
$.get("paginas/turnos/tbl_Turnos.php", {}, function (data, status) {
    $("#tablaTurno").html(data);
});
}

////////////////////////////////////////////