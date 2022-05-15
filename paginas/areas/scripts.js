
// INSERTAR CATEGORIA, MODAL //

$('#btnguardar').click(function(){

    var datos=$('#frmareas').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_areas.php",
        data:datos,
    success:function(r){
    if(r==1){

      alert("Fallo el server");

    }else{
      //toastr.success('Categoría agregada correctamente.');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Área agregada correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        $('#tablaArea').load('paginas/areas/tbl_areas.php');
        $('#txtdescripcion').val('');
        $('.modalinsertarArea').modal('toggle'); 
        
        }
    }
    });

return false;
});

////////////////////////////////////////////////////////

// FUNCION PARA OBTENERID Y LLENAR CAMPOS EN MODAL EDITAR //
function obtenerId(id){

    $("#hidden_area_id").val(id);
    //var txtaccion = 'obtener';
    $.post("negocios/obtenerArea.php", {
            id: id
            //txtaccion: txtaccion
        },
        function (data, status) {
            // PARSE json data
            var area = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_idarea").val(area.id);
            $("#txtEdescripcion").val(area.descripcion);
            //$("#txtEdescripcion").val(data);
        });
        $("#modaleditarea").modal("show");
}

//////////////////////////////////////////////////////

// FUNCION PARA ACTUALIZAR UN REGISTRO MODAL EDITAR //
    
function actualizarArea() {
    // get values
    var descripcion = $("#txtEdescripcion").val();
    var txtaccion = 2;

    // get hidden field value
    var id = $("#hidden_area_id").val();

    // Update the details by requesting to the server using ajax
    $.post("negocios/Ng_areas.php", {
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
            $("#modaleditarea").modal("hide");
            readRecords();
        }
    );
}

/////////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

  function eliminarArea(id){
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
        $.post("negocios/Ng_areas.php", {
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
$.get("paginas/areas/tbl_Areas.php", {}, function (data, status) {
    $("#tablaArea").html(data);
});
}

////////////////////////////////////////////