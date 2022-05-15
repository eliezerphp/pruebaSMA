
// INSERTAR CATEGORIA, MODAL //

$('#btnguardar').click(function(){

    var datos=$('#frmtrabajadores').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_trabajadores.php",
        data:datos,
    success:function(r){
    if(r==1){

      alert("Fallo el server");

    }else{
      //toastr.success('Categoría agregada correctamente.');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Trabajador agregado correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        $('#tablaTrabajador').load('paginas/Trabajadores/tbl_trabajadores.php');
        $('#txtnombres').val('');
        $('#txtapellidos').val('');
        $('#cbarea').val('').trigger('change.select2');
        $('#cbpuesto').val('').trigger('change.select2');
        $('.modalinsertarTrabajador').modal('toggle'); 
        
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

  function eliminarTrabajador(id){
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
        $.post("negocios/Ng_trabajadores.php", {
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
$.get("paginas/trabajadores/tbl_Trabajadores.php", {}, function (data, status) {
    $("#tablaTrabajador").html(data);
});
}

////////////////////////////////////////////