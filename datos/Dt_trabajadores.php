<?php

include_once("connect.php");

class DTTrabajadores extends Conexion
{
    private $myCon;

    public function listarTrabajadores()
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT tbl_trabajadores.id, tbl_trabajadores.id_area, tbl_trabajadores.id_puesto, tbl_trabajadores.nombres, tbl_trabajadores.apellidos, tbl_areas.descripcion as area, tbl_puestos.descripcion as puesto, tbl_trabajadores.estado FROM tbl_trabajadores
			JOIN tbl_puestos ON tbl_trabajadores.id_puesto = tbl_puestos.id
			JOIN tbl_areas ON tbl_trabajadores.id_area = tbl_areas.id
			order by tbl_trabajadores.nombres ASC";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$trabajadores = new Trabajadores();

				//_SET(CAMPOBD, atributoEntidad)			
				$trabajadores->__SET('id', $r->id);
				$trabajadores->__SET('id_area', $r->id_area);
				$trabajadores->__SET('id_puesto', $r->id_puesto);
				$trabajadores->__SET('nombres', $r->nombres);
				$trabajadores->__SET('apellidos', $r->apellidos);
				$trabajadores->__SET('area', $r->area);
				$trabajadores->__SET('puesto', $r->puesto);
				$trabajadores->__SET('estado', $r->estado);
							

				$result[] = $trabajadores;

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

    public function registrarTrabajador(Trabajadores $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_trabajadores (id_area, id_puesto, nombres, apellidos, estado) 
		        VALUES (?, ?, ?, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('id_area'),
			 $data->__GET('id_puesto'),
			 $data->__GET('nombres'),
			 $data->__GET('apellidos'),
			 $data->__GET('estado'),
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