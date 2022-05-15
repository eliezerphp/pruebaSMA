
// INSERTAR CATEGORIA, MODAL //

$('#btnguardar').click(function(){

    var datos=$('#frmmedios').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_medios.php",
        data:datos,
    success:function(r){
    if(r==1){

      alert("Fallo el server");

    }else{
      //toastr.success('Categoría agregada correctamente.');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Medio agregado correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        $('#tablaMedio').load('paginas/medios/tbl_medios.php');
        $('#txtdescripcion').val('');
        $('.modalinsertarMedio').modal('toggle'); 
        
        }
    }
    });

return false;
});

////////////////////////////////////////////////////////

// FUNCION PARA OBTENERID Y LLENAR CAMPOS EN MODAL EDITAR //
function obtenerId(id){

    $("#hidden_medio_id").val(id);
    //var txtaccion = 'obtener';
    $.post("negocios/obtenerMedio.php", {
            id: id
            //txtaccion: txtaccion
        },
        function (data, status) {
            // PARSE json data
            var medio = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_medio_id").val(medio.id);
            $("#txtEdescripcion").val(medio.descripcion);
            //$("#txtEdescripcion").val(data);
        });
        $("#modaleditmedio").modal("show");
}

//////////////////////////////////////////////////////

// FUNCION PARA ACTUALIZAR UN REGISTRO MODAL EDITAR //
    
function actualizarMedio() {
    // get values
    var descripcion = $("#txtEdescripcion").val();
    var txtaccion = 2;

    // get hidden field value
    var id = $("#hidden_medio_id").val();

    // Update the details by requesting to the server using ajax
    $.post("negocios/Ng_medios.php", {
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
            $("#modaleditmedio").modal("hide");
            readRecords();
        }
    );
}

/////////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

  function eliminarMedio(id){
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
        $.post("negocios/Ng_medios.php", {
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
$.get("paginas/medios/tbl_Medios.php", {}, function (data, status) {
    $("#tablaMedio").html(data);
});
}

////////////////////////////////////////////