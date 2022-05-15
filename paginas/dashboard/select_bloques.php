<?php
include('../../entidades/Bloques_turno.php');
include('../../datos/Dt_bloques_turno.php');

$dtbloques_turno = new DTBloques_turno();

$turno = $_POST['turno'];

?>
<!-- ROW DE BOTONES -->

<select name="cbbloques" id="cbbloques" class="form-control" data-width="100%">
    <option value=""></option>
    <?php foreach($dtbloques_turno->listarBloques_turno($turno) as $r): ?>
    <option value="<?php echo $r->__GET('id'); ?>"><?php echo 'Bloque '.$r->__GET('bloque').' - '; echo $r->__GET('hora_inicio').' - '.$r->__GET('hora_final'); ?></option>
    <?php endforeach; ?>
</select>