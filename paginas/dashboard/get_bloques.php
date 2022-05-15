<?php
$conexion=mysqli_connect('localhost','root','','sma');

$id_turno = $_POST["turno"];

$query_bloque = "SELECT bt.id, bt.id_bloque, bt.hora_inicio, bt.hora_final, b.descripcion as bloque FROM tbl_bloque_turno as bt 
JOIN tbl_turnos as t ON bt.id_turno = t.id
JOIN tbl_bloques as b ON bt.id_bloque = b.id
WHERE bt.id_turno = $id_turno ORDER by bt.id";

$resultado = mysqli_query($conexion, $query_bloque);

$html = "";

while ($row = mysqli_fetch_assoc($resultado)) {
  $html .= "<option value='".$row['id']."'> Bloque ".$row["bloque"]." - ".$row["hora_inicio"]." - ".$row["hora_final"]."</option>";
}
echo $html;
?>