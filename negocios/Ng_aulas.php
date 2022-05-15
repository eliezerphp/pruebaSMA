<?php

    include_once("../entidades/Aulas.php");
    include_once("../datos/Dt_aulas.php");

    if ($_POST) 
    {

    $aulas = new Aulas();
    $dtAulas = new DTAulas();
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    $aulas->__SET('descripcion', $_POST['txtdescripcion']);
            
                    $dtAulas->registrarAula($aulas);

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $aulas->__SET('id', $_POST['id']);
                    $aulas->__SET('descripcion', $_POST['descripcion']);

                    $dtAulas->actualizarAula($aulas);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Eliminar'){

            try 
        {
            
            $aulas->__SET('id', $_POST['id']);

            $dtAulas->eliminarAula($aulas);

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
    

    
