<?php

    include_once("../entidades/Trabajadores.php");
    include_once("../datos/Dt_trabajadores.php");

    if ($_POST) 
    {

    $trabajadores = new Trabajadores();
    $dtTrabajadores = new DTTrabajadores();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $trabajadores->__SET('id_area', $_POST['cbarea']);
                    $trabajadores->__SET('id_puesto', $_POST['cbpuesto']);
                    $trabajadores->__SET('nombres', $_POST['txtnombres']);
                    $trabajadores->__SET('apellidos', $_POST['txtapellidos']);
                    $trabajadores->__SET('estado', 1);
            
                    $dtTrabajadores->registrarTrabajador($trabajadores);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $trabajadores->__SET('id', $_POST['id']);
                    $trabajadores->__SET('id_area', $_POST['id_area']);
                    $trabajadores->__SET('id_puesto', $_POST['id_puesto']);
                    $trabajadores->__SET('nombres', $_POST['nombres']);
                    $trabajadores->__SET('apellidos', $_POST['apellidos']);
                    $trabajadores->__SET('estado', 1);

                    $dtTrabajadores->actualizarTrabajador($trabajadores);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $trabajadores->__SET('id', $_POST['id']);

            $dtTrabajadores->eliminarTrabajador($trabajadores);

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
    

    
