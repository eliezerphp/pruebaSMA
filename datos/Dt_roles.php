<?php

include_once("connect.php");

class DTRoles extends Conexion
{
    private $myCon;

    public function listarRoles()
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT * FROM tbl_roles";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$roles = new Roles();

				//_SET(CAMPOBD, atributoEntidad)			
				$roles->__SET('id', $r->id);
				$roles->__SET('descripcion', $r->descripcion);
							

				$result[] = $roles;

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

    public function registrarRol(Roles $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_roles (descripcion) 
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

    public function actualizarRol(Roles $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_roles SET 
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

	public function eliminarRol(Roles $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM tbl_roles WHERE id = ?";
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