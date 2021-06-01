<?php
require_once 'controladores/cargos.controlador.php';
// Muestra los contratos Cargados
$listaContratos = CargosControlador::ctrVerPeriodos();

if (isset($_POST['btnSync']))
{
    $a = new TalanaControlador();
    $a->actualizaContratosMes($_POST['idAno'],$_POST['idMeses']);
}

?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Sincronización datos de Talana</h3></center>
            <br>
            <br>
            <hr>


            <div class="row">
                <div class="col-4">

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Informe Head Count</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Periodos Sincronizados</h6>
                            <br>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Mes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listaContratos as $row)
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['periodo'].'</td>';
                                    echo '<td>'.nroaMes($row['mes']).'</td>';
                                    echo '</tr>';
                                }

                                ?>
                                </tbody>
                            </table>
                            <br>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                            <a href="#" class="card-link"><button type="button" data-toggle="modal" data-target="#modalHeadCount" class="btn btn-primary"><i class="fa fa-arrow-circle-o-up"></i> Sincronizar</button></a>

                        </div>
                    </div>
                </div>




            </div>
            <br>
            <hr>






        </div>
    </div>
</div>



<!-- Modal -->

<form method="post">
<div class="modal fade" id="modalHeadCount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sincronizar datos: Informe Head Count</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Seleccione periodo a sincronizar:<br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Año</label>
                            <select name="idAno" id="idAno" class="form-control">
                                <option value="-1">Seleccione Año</option>
                                <?php
                                foreach (devuelveAnos() as $row)
                                {
                                    if (isset($_POST['btnFiltrar']) && $_POST['idAno'] == $row) {
                                        echo '<option selected="selected" value="' . $row . '">' . $row . '</option>';
                                    }else
                                    {
                                        echo '<option value="' . $row . '">' . $row . '</option>';
                                    }

                                }

                                ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Año</label>
                            <select name="idMeses" id="idMeses" class="form-control">
                                <option value="-1">Seleccione Mes</option>
                                <?php
                                $tmp = devuelvemeses();
                                $listaMeses = array();
                                foreach ($tmp as $item) {
                                    $listaMeses[] = explode('|',$item);
                                }
                                foreach ($listaMeses as $row)
                                {
                                    if (isset($_POST['btnFiltrar']) && $_POST['idMeses'] == $row[1]) {
                                        echo '<option selected="selected" value="' . $row[1] . '">' . $row[0] . '</option>';
                                    }else
                                    {
                                        echo '<option value="' . $row[1] . '">' . $row[0] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="btnSync" name="btnSync" class="btn btn-primary"><i class="fa fa-arrow-circle-o-up"></i> Sincronizar</button>
            </div>
        </div>
    </div>
</div>

</form>