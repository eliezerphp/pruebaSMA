<?php
class Det_solicitudes
{
	private $id;
	private $id_solicitud;
	private $id_medio;
	private $medio;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}