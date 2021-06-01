<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/controladores/backlog.controlador.php';



$mod=$_POST['mod'];
$acc=$_POST['acc'];



switch ($mod)
{

    case 'backlog':

        if ($acc == 'eliminar')
        {
            if(isset($_POST['id']))
            {
                $idBacklog = $_POST['id'];
                $resu = BacklogControlador::ctrEliminaBacklog($idBacklog);
                echo $resu;
            }
        }

        if ($acc == 'editar')
        {
            if(isset($_POST['IdBacklogs']))
            {

            }
            $idBacklog = $_POST['IdBacklogs'];

            $a = array(
                'IdBacklogs' => $_POST['IdBacklogs'],
                'Nom_Cli' => $_POST['nomCliente_'.$idBacklog],
                'Rut_Cli' => $_POST['rutCliente_'.$idBacklog],
                'Nom_Proy' => $_POST['nomProyecto_'.$idBacklog],
                'Fecha_Ini' => $_POST['fechaInicio_'.$idBacklog],
                'Fecha_Fin' => $_POST['fechaFin_'.$idBacklog],
                'Id_Estado' => $_POST['dropEstado_'.$idBacklog],
                'Tot_Proy' => $_POST['totalProyecto_'.$idBacklog],
                'Notas_Proy' => $_POST['notas_'.$idBacklog],
                'CCO_Proy' => $_POST['dropCCO_'.$idBacklog],
                'Id_Empresa' => $_POST['dropEmpresa_'.$idBacklog],
            );

            $resu= BacklogControlador::ctrEditarBacklog($a);

            echo $resu;
            //echo 'fallo';
        }
        break;













}