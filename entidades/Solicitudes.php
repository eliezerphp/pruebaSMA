<?php
class Solicitudes
{
	private $id;
	private $id_usuario;
	private $id_turno;
	private $id_asignatura;
	private $id_aula;
	private $id_trabajador;
	private $id_bloque_turno;
	private $fecha_hora_solicitud;
	private $fecha;
	private $hora_inicio;
	private $hora_final;
	private $observaciones;
	private $estado;

	private $usuario;
	private $solicitante;
	private $asignatura;
	//private $turno;
	private $bloque;
	private $aula;
	private $pendientes;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}