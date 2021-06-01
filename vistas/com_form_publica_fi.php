<?php
ini_set('memory_limit', '1024M');
$listadoPublic = ComprobantesControlador::ctrObtenerPeriodosPublicados();

if(isset($_POST['btnPublicar']))
{

    $usrDat = $_SESSION['usuario'];
    $resu = new ComprobantesControlador();
    $resu->ctrCierraData($_POST['dropAno'],$_POST['dropMes'],$usrDat['usuario']);

}


// Maneja los mensajes entregado desde formularios POST
if (isset($_GET['msg']))
{
    $msg = $_GET['msg'];

    switch ($msg)
    {
        case 'err1':
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Problemas al publicar el periodo seleccionado
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
            break;

        case 'ok1':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Periodo publicado con éxito
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
            break;

            case 'err2':
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Problemas al eliminar el periodo publicado
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
            break;

        case 'ok2':
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Periodo eliminado con éxito
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
            break;
    }


}


if (isset($_POST))
{
    /*
     *                 <input type="hidden" id="modalOp" name="modalOp" value="elimina">
                <input type="hidden" id="mes" name="mes" value="'.$row['mes_cierre'].'">
                <input type="hidden" id="ano" name="ano" value="'.$row['ano_cierre'].'">
     */
    if (isset($_POST['modalOp']))
    {
        if ($_POST['modalOp'] == 'elimina')
        {
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];

            $res = new ComprobantesControlador();
            $res->ctrEliminaData($ano,$mes);

        }
    }
}

?>
<!--
<style xmlns="http://www.w3.org/1999/html">
    .table td {
        text-align: center;
    }
</style> -->

<div class="container">


    <div class="card">
        <div class="card-body">


            <div class="row">
                <div class="col-lg-12">
                    <h3>Publicar Resultados Financieros</h3>
                    <br><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmaPub"><i class="fa fa-save"></i> Publicar Periodo</button>
                    <br><br><br>



                    <h4>Periodos Publicados</h4>
                    <br>
<center></center>
                    <table class="table table-responsive-sm w-70">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Periodo</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Publicado el</th>
                            <th scope="col">Publicado por</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (empty($listadoPublic))
                        {
                            echo '<tr>';
                            echo '<td>Sin datos para mostrar</td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '</tr>';

                        }else
                        {
                            foreach ($listadoPublic as $row)
                            {
                                echo '<tr>';
                                echo '<td>'.$row['ano_cierre'].'</td>';
                                echo '<td>'.nroaMes($row['mes_cierre']).'</td>';
                                echo '<td>'.$row['fecha_cierre'].'</td>';
                                echo '<td>'.$row['usuario'].'</td>';
                                echo '<td><button type="button" data-toggle="modal" data-target="#modelelim_'.$row['ano_cierre'].'_'.$row['mes_cierre'].'" name="btnElimina_'.$row['ano_cierre'].'_'.$row['mes_cierre'].'" id="btnElimina_'.$row['ano_cierre'].'_'.$row['mes_cierre'].'" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                  </td>';
                                echo '</tr>';
                            }

                        }

                        ?>



                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<form method="post" name="formCierraPeriodo" id="formCierraPeriodo">
<div class="modal fade" id="modalConfirmaPub" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaPub" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check"></i> Publicar resultados financieros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        Seleccione el periodo a publicar:
                    </div>
                    <div class="col-sm-4">
                        <select name="dropMes" id="dropMes" class="form-control">
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <select name="dropAno" id="dropAno" class="form-control">
                            <option value="2020">2020</option>
                            <option value="2021" selected="selected">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                <button type="submit" name="btnPublicar" id="btnPublicar" class="btn btn-primary"><i class="fa fa-check"></i> Publicar</button>
            </div>
        </div>
    </div>
</div>
</form>


<?php

foreach ($listadoPublic as $row)
{
    echo '<!-- Modal -->
    <form method="post">
<div class="modal fade" id="modelelim_'.$row['ano_cierre'].'_'.$row['mes_cierre'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> ¡Aviso!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                Está a punto de eliminar el periodo publicado <br>(Año: '.$row['ano_cierre'].' - Mes: '.nroaMes($row['mes_cierre']).').<br>
                <b>¿Desea continuar?</b><br>
                <input type="hidden" id="modalOp" name="modalOp" value="elimina">
                <input type="hidden" id="mes" name="mes" value="'.$row['mes_cierre'].'">
                <input type="hidden" id="ano" name="ano" value="'.$row['ano_cierre'].'">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
</form>';

}
?>