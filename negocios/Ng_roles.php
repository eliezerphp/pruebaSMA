<?php

    include_once("../entidades/Roles.php");
    include_once("../datos/Dt_roles.php");

    if ($_POST) 
    {

    $roles = new Roles();
    $dtRoles = new DTRoles();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $roles->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtRoles->registrarRol($roles);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $roles->__SET('id', $_POST['id']);
                    $roles->__SET('descripcion', $_POST['descripcion']);

                    $dtRoles->actualizarRol($roles);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $roles->__SET('id', $_POST['id']);

            $dtRoles->eliminarRol($roles);

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
    

    
