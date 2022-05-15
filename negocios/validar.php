<?php  session_start();

$conexion = mysqli_connect("localhost", "root", "", "sma");

if (isset($_POST['login'])) {
  $usuario=mysqli_real_escape_string($conexion, $_POST['lusuario']);
  $contraseña= mysqli_real_escape_string($conexion, $_POST['lcontraseña']);

  $query = "SELECT tbl_usuarios.id as id_usuario, tbl_usuarios.id_trabajador, tbl_usuarios.id_rol, tbl_usuarios.usuario, tbl_usuarios.contraseña, tbl_usuarios.estado, CONCAT(tbl_trabajadores.nombres, ' ', tbl_trabajadores.apellidos) as trabajador, tbl_roles.descripcion as rol
  FROM tbl_usuarios 
  JOIN tbl_roles ON tbl_usuarios.id_rol = tbl_roles.id
  JOIN tbl_trabajadores ON tbl_usuarios.id_trabajador = tbl_trabajadores.id
  WHERE tbl_usuarios.usuario = '$usuario' AND tbl_usuarios.contraseña = '$contraseña' AND tbl_usuarios.estado = 1";

  $resultado= mysqli_query($conexion, $query);

  if (mysqli_num_rows($resultado)>0) {
    $row = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['id_usuario'] = $row['id_usuario'];

    echo "<script>window.location='../index.php';</script>";
  } else {
    echo "<script>alert('El usuario y la contraseña no coinciden.');</script>";
    echo "<script>window.location='../login.php'</script>";
  }

  mysqli_close($conexion);
}


 ?>
