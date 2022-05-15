<?php

    include_once("../entidades/Medios.php");
    include_once("../datos/Dt_medios.php");

    if ($_POST) 
    {

    $medios = new Medios();
    $dtMedios = new DTMedios();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $medios->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtMedios->registrarMedio($medios);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $medios->__SET('id', $_POST['id']);
                    $medios->__SET('descripcion', $_POST['descripcion']);

                    $dtMedios->actualizarMedio($medios);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $medios->__SET('id', $_POST['id']);

            $dtMedios->eliminarMedio($medios);

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
    

    
