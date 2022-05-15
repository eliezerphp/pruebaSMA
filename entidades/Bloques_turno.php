<?php
class Bloques_turno
{
	private $id;
	private $id_bloque;
	private $id_turno;
	private $hora_inicio;
	private $hora_final;
	private $bloque;
	private $turno;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}