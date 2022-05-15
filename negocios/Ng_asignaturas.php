<?php

    include_once("../entidades/Asignaturas.php");
    include_once("../datos/Dt_asignaturas.php");

    if ($_POST) 
    {

    $asignaturas = new Asignaturas();
    $dtAsignaturas = new DTAsignaturas();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $asignaturas->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtAsignaturas->registrarAsignatura($asignaturas);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $asignaturas->__SET('id', $_POST['id']);
                    $asignaturas->__SET('descripcion', $_POST['descripcion']);

                    $dtAsignaturas->actualizarAsignatura($asignaturas);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $asignaturas->__SET('id', $_POST['id']);

            $dtAsignaturas->eliminarAsignatura($asignaturas);

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
    

    
