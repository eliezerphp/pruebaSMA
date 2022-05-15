<?php

    include_once("../entidades/Puestos.php");
    include_once("../datos/Dt_puestos.php");

    if ($_POST) 
    {

    $puestos = new Puestos();
    $dtPuestos = new DTPuestos();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $puestos->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtPuestos->registrarPuesto($puestos);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $puestos->__SET('id', $_POST['id']);
                    $puestos->__SET('descripcion', $_POST['descripcion']);

                    $dtPuestos->actualizarPuesto($puestos);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $puestos->__SET('id', $_POST['id']);

            $dtPuestos->eliminarPuesto($puestos);

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
    

    
