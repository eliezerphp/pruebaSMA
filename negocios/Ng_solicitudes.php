<?php

    include_once("../entidades/Solicitudes.php");
    include_once("../datos/Dt_solicitudes.php");

    include_once("../entidades/Det_solicitudes.php");
    include_once("../datos/Dt_det_solicitudes.php");

    if ($_POST) 
    {

    $solicitudes = new Solicitudes();
    $dtSolicitudes = new DTSolicitudes();

    $det_solicitudes = new Det_solicitudes();
    $dt_detsolicitudes = new DTDet_solicitudes();

    date_default_timezone_set('America/Managua');


    $fecha = date("Y-m-d G.i:s", time());
    
        $varAccion = $_POST['txtaccion'];

        if($varAccion == 1){
            try 
                {
                    // echo 'ID USUARIO: '.$_POST['id_usuario'];
                    // echo 'id_turno: '.$_POST['cbturno'];
                    // echo 'id_asignatura: '.$_POST['cbasignaturas'];
                    // echo 'id_aula: '.$_POST['cbaula'];
                    // echo 'id_trabajador: '.$_POST['cbtrabajador'];
                    // echo 'fecha_hora_solicitud: '.$fecha;
                    // echo 'fecha: '.$_POST['fecha_prestamo'];
                    // echo 'hora_inicio: '.$_POST['hora_inicio'];
                    // echo 'hora_entrega: '.$_POST['hora_entrega'];
                    // ($_POST['cbturno'] != '') && ($_POST['cbasignaturas'] != '') && ($_POST['cbaula'] != '') && ($_POST['cbtrabajador'] != '') && ($_POST['fecha_prestamo'] != '') && ($_POST['hora_inicio'] != '') && ($_POST['hora_llegada'] != '')
                    // if ($_POST['cbturno'] != '') {
                        
                        $conversion= strtotime($_POST['fecha_prestamo']);
                    
                        $solicitudes->__SET('id_usuario', $_POST['id_usuario']);
                        //$solicitudes->__SET('id_turno', $_POST['cbturno']);
                        $solicitudes->__SET('id_asignatura', $_POST['cbasignaturas']);
                        $solicitudes->__SET('id_aula', $_POST['cbaula']);
                        $solicitudes->__SET('id_trabajador', $_POST['cbtrabajador']);
                        $solicitudes->__SET('id_bloque_turno', $_POST['cbbloques']);
                        $solicitudes->__SET('fecha_hora_solicitud', $fecha);
                        $solicitudes->__SET('fecha', date('Y-m-d', $conversion));
                        $solicitudes->__SET('observaciones', $_POST['TAobservaciones']);
                        $solicitudes->__SET('estado', 1);
    
                        $dtSolicitudes->registrarSolicitud($solicitudes);
    
                        
    
                    foreach ($_POST['medios'] as $seleccionados) {
    
                                foreach ($dtSolicitudes->ultimoID_solicitudes() as $r) {
    
                                $det_solicitudes->__SET('id_solicitud', $r->__GET('id'));
                                $det_solicitudes->__SET('id_medio', $seleccionados);
        
                                $dt_detsolicitudes->registrarDetsolicitud($det_solicitudes);
    
        
                            }
    
                        }

                    // } else {

                    //     $mensaje = '<script>alert("Fallo en la generación de solicitud.");</script>';

                    //     echo $mensaje;

                    // }

                 } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        } 
        
        if ($varAccion == 2) {
            try 
                {
                    
                    $solicitudes->__SET('id', $_POST['id']);
                    $solicitudes->__SET('id_area', $_POST['id_area']);
                    $solicitudes->__SET('id_puesto', $_POST['id_puesto']);
                    $solicitudes->__SET('nombres', $_POST['nombres']);
                    $solicitudes->__SET('apellidos', $_POST['apellidos']);
                    $solicitudes->__SET('estado', 1);

                    $dtSolicitudes->actualizarTrabajador($solicitudes);

                } 
                catch (Exception $e) 
                {
                    die($e->getMessage());
                }
        }

        if($varAccion == 'Enproceso'){

            try 
        {
            
            $solicitudes->__SET('id', $_POST['id']);
            $solicitudes->__SET('estado', $_POST['estado']);

            $dtSolicitudes->actualizarEstado($solicitudes);

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

        }

        if($varAccion == 'Finalizado'){

            try 
        {
            
            $solicitudes->__SET('id', $_POST['id']);
            $solicitudes->__SET('estado', $_POST['estado']);

            $dtSolicitudes->actualizarEstado($solicitudes);

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
    

    
