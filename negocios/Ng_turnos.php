<?php

    include_once("../entidades/Turnos.php");
    include_once("../datos/Dt_turnos.php");

    if ($_POST) 
    {

    $turnos = new Turnos();
    $dtTurnos = new DTTurnos();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $turnos->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtTurnos->registrarTurno($turnos);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $turnos->__SET('id', $_POST['id']);
                    $turnos->__SET('descripcion', $_POST['descripcion']);

                    $dtTurnos->actualizarTurno($turnos);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $turnos->__SET('id', $_POST['id']);

            $dtTurnos->eliminarTurno($turnos);

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
    

    
