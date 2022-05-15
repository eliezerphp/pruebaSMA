<?php

include_once("connect.php");

class DTSolicitudes extends Conexion
{
    private $myCon;

    public function listarSolicitudes($turno)
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT sol.id, sol.id_usuario, sol.id_asignatura, 
			sol.id_aula, sol.id_trabajador, sol.fecha_hora_solicitud, DATE_FORMAT(sol.fecha, '%d/%m/%Y') AS fecha, 
			sol.estado, usu.usuario, bt.id_turno, bt.hora_inicio, bt.hora_final ,
			CONCAT(tra.nombres, ' ', tra.apellidos) as solicitante, asi.descripcion as asignatura, 
			sol.observaciones, tur.descripcion as turno, aul.descripcion as aula, b.descripcion as bloque
			FROM tbl_solicitudes AS sol
			JOIN tbl_usuarios as usu ON sol.id_usuario = usu.id
			JOIN tbl_bloque_turno as bt ON sol.id_bloque_turno = bt.id
			join tbl_bloques as b on bt.id_bloque = b.id
			JOIN tbl_trabajadores as tra ON sol.id_trabajador = tra.id
			JOIN tbl_turnos as tur ON bt.id_turno = tur.id
			JOIN tbl_aulas as aul ON sol.id_aula = aul.id
			JOIN tbl_asignaturas as asi ON sol.id_asignatura = asi.id
			WHERE sol.id IN (SELECT dsol.id_solicitud FROM tbl_det_solicitud AS dsol) AND bt.id_turno = $turno";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$solicitudes = new Solicitudes();

				//_SET(CAMPOBD, atributoEntidad)			
				$solicitudes->__SET('id', $r->id);
				$solicitudes->__SET('id_usuario', $r->id_usuario);
				$solicitudes->__SET('id_turno', $r->id_turno);
				$solicitudes->__SET('id_asignatura', $r->id_asignatura);
				$solicitudes->__SET('id_aula', $r->id_aula);
				$solicitudes->__SET('id_trabajador', $r->id_trabajador);
				$solicitudes->__SET('fecha_hora_solicitud', $r->fecha_hora_solicitud);
				$solicitudes->__SET('fecha', $r->fecha);
				$solicitudes->__SET('hora_inicio', $r->hora_inicio);
				$solicitudes->__SET('hora_final', $r->hora_final);
				$solicitudes->__SET('observaciones', $r->observaciones);
				$solicitudes->__SET('estado', $r->estado);
				
				$solicitudes->__SET('usuario', $r->usuario);
				$solicitudes->__SET('solicitante', $r->solicitante);
				$solicitudes->__SET('asignatura', $r->asignatura);
				$solicitudes->__SET('bloque', $r->bloque);
				//$solicitudes->__SET('turno', $r->turno);
				$solicitudes->__SET('aula', $r->aula);
							

				$result[] = $solicitudes;

				//var_dump($result);
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function registrarSolicitud(Solicitudes $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_solicitudes(id_usuario, id_asignatura, id_aula, id_trabajador, id_bloque_turno, fecha_hora_solicitud, fecha, observaciones, estado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('id_usuario'),
			 $data->__GET('id_asignatura'),
			 $data->__GET('id_aula'),
			 $data->__GET('id_trabajador'),
			 $data->__GET('id_bloque_turno'),
			 $data->__GET('fecha_hora_solicitud'),
			 $data->__GET('fecha'),
			 $data->__GET('observaciones'),
			 $data->__GET('estado'),
			));

			//$lastId = $this->myCon->lasInsertId();

			$this->myCon = parent::desconectar();

			//return $lastId;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function actualizarEstado(Solicitudes $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_solicitudes SET 
						estado = ?
				    WHERE id = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('estado'),
					$data->__GET('id')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

    /*public function obtenerCategoria($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM tbl_categorias WHERE id = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$categoria = new Categorias();

			$categoria->__SET('id', $r->id);
			$categoria->__SET('descripcion', $r->descripcion);

			$this->myCon = parent::desconectar();
			return $categoria;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/

	public function eliminarTrabajador(Trabajadores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM tbl_trabajadores WHERE id = ?";
			$stm = $this->myCon->prepare($querySQL);
		    $stm->execute(array($data->__GET('id')));

			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ultimoID_solicitudes()
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT MAX(id) AS id FROM tbl_solicitudes";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$ultimoId = new Solicitudes();

				//_SET(CAMPOBD, atributoEntidad)			
				$ultimoId->__SET('id', $r->id);

				$result[] = $ultimoId;

				//var_dump($result);
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}