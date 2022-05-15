<?php

include_once("connect.php");

class DTDet_solicitudes extends Conexion
{
    private $myCon;

    public function listarDetsolicitudes($id)
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT ds.id, ds.id_solicitud, ds.id_medio, md.descripcion as medio FROM tbl_det_solicitud AS ds
			JOIN tbl_medios AS md ON ds.id_medio = md.id
			WHERE id_solicitud = $id;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$det_solicitudes = new Det_solicitudes();

				//_SET(CAMPOBD, atributoEntidad)			
				$det_solicitudes->__SET('id', $r->id);
				$det_solicitudes->__SET('id_solicitud', $r->id_solicitud);
				$det_solicitudes->__SET('id_medio', $r->id_medio);
				$det_solicitudes->__SET('medio', $r->medio);
							

				$result[] = $det_solicitudes;

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

    public function registrarDetsolicitud(Det_solicitudes $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_det_solicitud(id_solicitud, id_medio) 
		        VALUES (?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('id_solicitud'),
			 $data->__GET('id_medio')
			));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function actualizarTrabajador(Trabajadores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_trabajadores SET 
						id_area = ?,
						id_puesto = ?,
						nombres = ?,
						apellidos = ?,
						estado = ?
				    WHERE id = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('id_area'),
					$data->__GET('id_puesto'),
					$data->__GET('nombres'),
					$data->__GET('apellidos'),
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
}