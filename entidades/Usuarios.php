<?php
class Usuarios
{
	private $id;
	private $id_trabajador;
	private $id_rol;
	private $usuario;
	private $contraseña;
	private $rol;
	private $trabajador;
	private $estado;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}