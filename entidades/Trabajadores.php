<?php
class Trabajadores
{
	private $id;
	private $id_area;
	private $id_puesto;
	private $nombres;
	private $apellidos;
	private $area;
	private $puesto;
	private $estado;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}