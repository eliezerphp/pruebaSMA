<?php

include_once("connect.php");

class DTAsignaturas extends Conexion
{
    private $myCon;

    public function listarAsignaturas()
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM tbl_asignaturas order by descripcion ASC";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$asignaturas = new Asignaturas();

				//_SET(CAMPOBD, atributoEntidad)			
				$asignaturas->__SET('id', $r->id);
				$asignaturas->__SET('descripcion', $r->descripcion);
							

				$result[] = $asignaturas;

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

    public function registrarAsignatura(Asignaturas $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_asignaturas (descripcion) 
		        VALUES (?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('descripcion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function actualizarAsignatura(Asignaturas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_asignaturas SET 
						descripcion = ?
				    WHERE id = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('descripcion'),
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

	public function eliminarAsignatura(Asignaturas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM tbl_asignaturas WHERE id = ?";
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