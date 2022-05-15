<?php

    include_once("../entidades/Usuarios.php");
    include_once("../datos/Dt_usuarios.php");

    if ($_POST) 
    {

    $usuarios = new Usuarios();
    $dtUsuarios = new DTUsuarios();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $usuarios->__SET('id_trabajador', $_POST['cbtrabajador']);
                    $usuarios->__SET('id_rol', $_POST['cbrol']);
                    $usuarios->__SET('usuario', $_POST['txtusuario']);
                    $usuarios->__SET('contraseña', $_POST['txtcontraseña']);
                    $usuarios->__SET('estado', 1);
            
                    $dtUsuarios->registrarUsuario($usuarios);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    $usuarios->__SET('id', $_POST['id']);
                    $usuarios->__SET('id_trabajador', $_POST['id_trabajador']);
                    $usuarios->__SET('id_rol', $_POST['id_rol']);
                    $usuarios->__SET('usuario', $_POST['usuario']);
                    $usuarios->__SET('contraseña', $_POST['contraseña']);
                    $usuarios->__SET('estado', 1);

                    $dtUsuarios->actualizarUsuario($usuarios);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $usuarios->__SET('id', $_POST['id']);

            $dtUsuarios->eliminarUsuario($usuarios);

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

        }

        /*if($varAccion == 'obtener'){

            try 
            {
            
                $categorias->__SET('id', $_POST['id']);

                $dtCategorias->obtenerCategoria($categorias);
 
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }

        }*/

    }
    

    
