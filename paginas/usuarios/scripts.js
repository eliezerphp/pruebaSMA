
// INSERTAR CATEGORIA, MODAL //

$('#btnguardar').click(function(){

    var datos=$('#frmusuarios').serialize();

    $.ajax({
        type:"POST",
        url:"negocios/Ng_usuarios.php",
        data:datos,
    success:function(r){
    if(r==1){

      alert("Fallo el server");

    }else{
      //toastr.success('Categoría agregada correctamente.');
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Categoría agregada correctamente.',
        showConfirmButton: false,
        timer: 1500
        });

        $('#tablaUsuario').load('paginas/usuarios/tbl_usuarios.php');
        $('#txtusuario').val('');
        $('#txtcontraseña').val('');
        $('#cbtrabajador').val('').trigger('change.select2');
        $('#cbrol').val('').trigger('change.select2');
        $('.modalinsertarCat').modal('toggle'); 
        
        }
    }
    });

return false;
});

////////////////////////////////////////////////////////

// FUNCION PARA OBTENERID Y LLENAR CAMPOS EN MODAL EDITAR //
function obtenerId(id){

    $("#hidden_usuario_id").val(id);
    //var txtaccion = 'obtener';
    $.post("negocios/obtenerUsuario.php", {
            id: id
            //txtaccion: txtaccion
        },
        function (data, status) {
            // PARSE json data
            var usuario = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#hidden_usuario_id").val(usuario.id);
            $("#txtEusuario").val(usuario.usuario);
            $("#txtEcontraseña").val(usuario.contraseña);
            $('#cbEtrabajador').val(usuario.id_trabajador).trigger('change.select2');
            $('#cbErol').val(usuario.id_rol).trigger('change.select2');
            //$("#txtEdescripcion").val(data);
        });
        $("#modaleditusuario").modal("show");
}

//////////////////////////////////////////////////////

// FUNCION PARA ACTUALIZAR UN REGISTRO MODAL EDITAR //
    
function actualizarUsuario() {
    // get values
    var id = $("#hidden_usuario_id").val();
    var id_trabajador = $("#cbEtrabajador").val();
    var id_rol = $("#cbErol").val();
    var usuario = $("#txtEusuario").val();
    var contraseña = $("#txtEcontraseña").val();

    var txtaccion = 2;

    // get hidden field value
    var id = $("#hidden_usuario_id").val();

    // Update the details by requesting to the server using ajax
    $.post("negocios/Ng_usuarios.php", {
            id: id,
            id_trabajador: id_trabajador,
            id_rol: id_rol,
            usuario: usuario,
            contraseña: contraseña,
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
            $("#modaleditusuario").modal("hide");
            readRecords();
        }
    );
}

/////////////////////////////////////////////////////////

// FUNCION PARA ELIMINAR UNA CATEGORIA //

  function eliminarUsuario(id){
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
        $.post("negocios/Ng_usuarios.php", {
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
$.get("paginas/usuarios/tbl_usuarios.php", {}, function (data, status) {
    $("#tablaUsuario").html(data);
});
}

////////////////////////////////////////////