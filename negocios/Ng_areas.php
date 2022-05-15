<?php

    include_once("../entidades/Areas.php");
    include_once("../datos/Dt_areas.php");

    if ($_POST) 
    {

    $areas = new Areas();
    $dtAreas = new DTAreas();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $areas->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtAreas->registrarArea($areas);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $areas->__SET('id', $_POST['id']);
                    $areas->__SET('descripcion', $_POST['descripcion']);

                    $dtAreas->actualizarArea($areas);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $areas->__SET('id', $_POST['id']);

            $dtAreas->eliminarArea($areas);

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
    

    
