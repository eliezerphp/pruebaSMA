<?php

include_once("connect.php");

class DTUsuarios extends Conexion
{
    private $myCon;

    public function listarUsuarios()
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT tbl_usuarios.id, tbl_usuarios.id_trabajador, tbl_usuarios.id_rol, tbl_usuarios.usuario, tbl_usuarios.contraseña, tbl_usuarios.estado, CONCAT(tbl_trabajadores.nombres, ' ', tbl_trabajadores.apellidos) as trabajador, tbl_roles.descripcion as rol
			FROM tbl_usuarios 
			JOIN tbl_roles ON tbl_usuarios.id_rol = tbl_roles.id
			JOIN tbl_trabajadores ON tbl_usuarios.id_trabajador = tbl_trabajadores.id";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$usuarios = new Usuarios();

				//_SET(CAMPOBD, atributoEntidad)			
				$usuarios->__SET('id', $r->id);
				$usuarios->__SET('id_trabajador', $r->id_trabajador);
				$usuarios->__SET('id_rol', $r->id_rol);
				$usuarios->__SET('usuario', $r->usuario);
				$usuarios->__SET('contraseña', $r->contraseña);
				$usuarios->__SET('rol', $r->rol);
				$usuarios->__SET('trabajador', $r->trabajador);
				$usuarios->__SET('estado', $r->estado);
							

				$result[] = $usuarios;

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

    public function registrarUsuario(Usuarios $data)
	{
		try 
		{
			
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO tbl_usuarios (id_trabajador, id_rol, usuario, contraseña, estado) 
		        VALUES (?, ?, ?, ?, ?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('id_trabajador'),
			 $data->__GET('id_rol'),
			 $data->__GET('usuario'),
			 $data->__GET('contraseña'),
			 $data->__GET('estado')
			));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function actualizarUsuario(Usuarios $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE tbl_usuarios SET 
						id_trabajador = ?,
						id_rol = ?,
						usuario = ?,
						contraseña = ?,
						estado = ?
				    WHERE id = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('id_trabajador'),
					$data->__GET('id_rol'),
					$data->__GET('usuario'),
					$data->__GET('contraseña'),
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

	public function eliminarUsuario(Usuarios $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM tbl_usuarios WHERE id = ?";
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