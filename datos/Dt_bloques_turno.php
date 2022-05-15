<?php

include_once("connect.php");

class DTBloques_turno extends Conexion
{
    private $myCon;

    public function listarBloques_turno($id)
	{
        try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT bt.id, bt.id_bloque, bt.id_turno, bt.hora_inicio, bt.hora_final, b.descripcion as bloque, t.descripcion as turno 
			from tbl_bloque_turno as bt 
			JOIN tbl_turnos as t ON bt.id_turno = t.id 
			JOIN tbl_bloques as b ON bt.id_bloque = b.id
			WHERE bt.id_turno = $id";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				
				$bloque_turno = new Bloques_turno();

				//_SET(CAMPOBD, atributoEntidad)
				$bloque_turno->__SET('id', $r->id);
				$bloque_turno->__SET('id_bloque', $r->id_bloque);
				$bloque_turno->__SET('id_turno', $r->id_turno);
				$bloque_turno->__SET('hora_inicio', $r->hora_inicio);
				$bloque_turno->__SET('hora_final', $r->hora_final);
				$bloque_turno->__SET('bloque', $r->bloque);
				$bloque_turno->__SET('turno', $r->turno);
							

				$result[] = $bloque_turno;

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