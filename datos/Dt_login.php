<?php 

    require_once("connect.php");

    class Login {

        public function usuarioValidar($usuario, $contraseña)
        {
            try
            {
                $this->myCon = parent::conectar();
                $result = array();
                $querySQL = "SELECT tbl_usuarios.id, tbl_usuarios.id_trabajador, tbl_usuarios.id_rol, tbl_usuarios.usuario, tbl_usuarios.contraseña, tbl_usuarios.estado, CONCAT(tbl_trabajadores.nombres, ' ', tbl_trabajadores.apellidos) as trabajador, tbl_roles.descripcion as rol
                FROM tbl_usuarios 
                JOIN tbl_roles ON tbl_usuarios.id_rol = tbl_roles.id
                JOIN tbl_trabajadores ON tbl_usuarios.id_trabajador = tbl_trabajadores.id
                WHERE tbl_usuarios.usuario = 'Admin' AND tbl_usuarios.contraseña = 'admin123' AND tbl_usuarios.estado = 1";
    
                $stm = $this->myCon->prepare($querySQL);
                $stm->execute();
    
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    
                    $login = new Logins();
    
                    //_SET(CAMPOBD, atributoEntidad)			
                    $login->__SET('id', $r->id);
                    $login->__SET('id_trabajador', $r->id_trabajador);
                    $login->__SET('id_rol', $r->id_rol);
                    $login->__SET('usuario', $r->usuario);
                    $login->__SET('contraseña', $r->contraseña);
                    $login->__SET('rol', $r->rol);
                    $login->__SET('trabajador', $r->trabajador);
                    $login->__SET('estado', $r->estado);
                                
    
                    $result[] = $login;
    
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


        
    //     public function validarDatos($usu, $pass) {

    //         try {
    //             $con = null;
    //             $sql = null;
    //             $resultado = null;
    //             $cantidad_resultado = null;

    //             // Recuperamos la conexión
    //             $con = Conexion::getConection();

    //             // Validación de error
    //             if ($con == "ERROR") {
    //                 header("location:CtrlSalir.php");
    //             }

    //             // Consulta
    //             $sql = "SELECT * FROM tbl_usuarios WHERE usuario = :USU AND contraseña = :PASS AND estado = 1";

    //             $resultado = $con->prepare($sql);
    //             $resultado->execute(array(":USU"=>$usu, ":PASS"=>$pass));

    //             $cantidad_resultado = $resultado->rowCount();

    //             session_start();

    //             if ($cantidad_resultado == 1) {
    //                 $_SESSION["usuario"] = $usu;
    //                 $_SESSION["contraseña"] = $pass;  

    //             } else {
    //                 echo "<script>alert('no existe');</script>";
    //                 // $_SESSION["error"] = "ERROR";

    //             }

                
    //         } catch (Exception $e) {


    //         } finally {

    //             $con = null;
    //             $sql = null;
    //             $resultado = null;
    //             $cantidad_resultado = null;

    //             header("location:../index.php");

    //         }

    //     }

    // }