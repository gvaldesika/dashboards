<?php

require_once 'modelos/backlog.modelo.php';

$lista = BacklogControlador::mdlVerBacklog();
$listaEstados = TablasControlador::ctrObtenerTabla(2);
$listaCCO = AuxiliaresControlador::ctrVerTodosCCO();

$listaEmpresas = empresasIKA();



if (isset($_POST['btnGuardarBack']))
{
    $a = array(
        'nomCliente' => $_POST['nomCliente'],
        'rutCliente' => $_POST['rutCliente'],
        'nomProyecto' => $_POST['nomProyecto'],
        'fechaInicio' => $_POST['fechaInicio'],
        'fechaFin' => $_POST['fechaFin'],
        'totalProyecto' => $_POST['totalProyecto'],
        'idEstado' => $_POST['dropEstado'],
        'notas' => $_POST['notas'],
        'idCCO' => $_POST['dropCCO'],
        'idEmpresa' => $_POST['dropEmpresa']

    );

    $res = new BacklogControlador();
    $res->ctrInsertarBacklog($a);
    echo '<script>
                        window.location = "main.php?pag=com_form_backlog";
                    </script>';

}
?>
<style>
    .table td {
        text-align: center;
    }

    .bold-blue {
        font-weight: bold;
        color: #0277BD;
    }

    .container {
        max-width: 1340px;
    }
</style>




<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Editor Backlog</h3></center><br><br>



<div class="row">
    <div class="col-sm-2">
            <select name="dropEstados" id="dropEstados" class="form-control">
                <option value="-1" selected="selected">Todos los Estados</option>
                <?php
                foreach ($listaEstados as $row)
                {
                    echo '<option value="'.$row['Id_Dato'].'">'.$row['Valor_Dato'].'</option>';
                }
                ?>
            </select>
    </div>
    <div class="col-sm-1">
        <button type="button" class="btn btn-primary btn-sm"><li class="fa fa-eye"></li></button>
    </div>

</div>

            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Nuevo Backlog
            </button>
            <br>
            <br>
            <table id="table" class="table table-bordered" data-toggle="table"
                   data-search="true"
                   data-filter-control="true"
                   data-show-export="true"
                   data-click-to-select="true">



                <thead>
                <tr>
                    <td class="table-secondary"><b>Nombre Proyecto</b></td>
                    <td class="table-secondary"><b>Cliente</b></td>
                    <td class="table-secondary"><b>CCO</b></td>
                    <td class="table-success"><b>Inicio</b></td>
                    <td class="table-danger"><b>Fin</b></td>
                    <td class="table-secondary"><b>Estado</b></td>
                    <td class="table-secondary"><b>Total Proyecto (MM$)</b></td>
                    <td class="table-secondary"><b>Acciones</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
$totalBacklog = 0;
                foreach ($lista as $row)
                {
                    $totalBacklog = $totalBacklog + $row['Tot_Proy'];
                    echo '<tr>';
                    echo '<td>'.$row['Nom_Proy'].'</td>';
                    echo '<td>'.$row['Nom_Cli'].'</td>';
                    echo '<td>'.$row['CCO_Proy'].'</td>';
                    echo '<td>'.nroaMes((int)date('m',strtotime($row['Fecha_Ini']))).'-'.date('Y',strtotime($row['Fecha_Ini'])).'</td>';
                    echo '<td>'.nroaMes((int)date('m',strtotime($row['Fecha_Fin']))).'-'.date('Y',strtotime($row['Fecha_Fin'])).'</td>';
                    echo '<td>'.$row['estado'].'</td>';
                    echo '<td>$'.number_format($row['Tot_Proy'],0,',','.').'</td>';
                    echo '<td>
                              <form>
                              <button data-toggle="modal" data-target="#modal_edita_'.$row['IdBacklogs'].'"  id="edit_'.$row['IdBacklogs'].'" name="edit_'.$row['IdBacklogs'].'" type="button" class="btn btn-primary" tooltip="Editar"><li class="fa fa-edit"></li></button>
                              <button data-toggle="modal" data-target="#modalElimina_'.$row['IdBacklogs'].'" id="delete_'.$row['IdBacklogs'].'" name="delete_'.$row['IdBacklogs'].'" type="button" class="btn btn-danger" tooltip="Eliminar"><li class="fa fa-trash"></li></button>
                              </form>
                              </td>';
                    echo '</tr>';
                }
                ?>
<!--
                <tr>
                    <td scope="row">Bocamina Carbon</td>
                    <td>ENEL</td>
                    <td>Octubre 2020</td>
                    <td>Diciembre 2021</td>
                    <td><li class="fa fa-truck"></li> En Ejecución</td>
                    <td>$4.100</td>
                    <td><button type="button" class="btn btn-primary" tooltip="Editar"><li class="fa fa-edit"></li></button>
                        <button type="button" class="btn btn-danger" tooltip="Editar"><li class="fa fa-trash"></li></button>
                        <button type="button" class="btn btn-secondary" tooltip="Editar"><li class="fa fa-check"></li></button></td>
                </tr> -->


                </tbody>
                <tfoot>
                <tr>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"><b>Total:</b></td>
                    <td class="table-active"><b><?php echo '$'.number_format($totalBacklog,0,',','.') ?></b></td>
                    <td class="table-active"></td>

                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->



<?php
foreach ($lista as $row)
{
    echo '
    <form method="post" id="form_elim_'.$row['IdBacklogs'].'" name="form_elim_'.$row['IdBacklogs'].'" enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-sm" id="modalElimina_'.$row['IdBacklogs'].'" tabindex="-1" role="dialog" aria-labelledby="modalElimina_'.$row['IdBacklogs'].'" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <center>
                <b>Está a punto de eliminar el backlog de: </b><br>
                '.$row['Nom_Cli'].' - '.$row['Nom_Proy'].'
                <br>
                ¿Desea continuar?
                <input type="hidden" id="idBacklog" name="idBacklog" value="'.$row['IdBacklogs'].'">
                <input type="hidden" id="mod" name="mod" value="backlog">
                <input type="hidden" id="acc" name="acc" value="eliminar">
                <br><br>               
    <div id="loadingDiv_'.$row['IdBacklogs'].'" name="loadingDiv_'.$row['IdBacklogs'].'"> Trabajando ... <img src="http://ika.cl/extranet/html/images/loader/ajax-loader.gif"/>          </div><br>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button name="btnElimina_'.$row['IdBacklogs'].'" id="btnElimina_'.$row['IdBacklogs'].'" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">

$(document).ready(function(){ 
        $("#loadingDiv_'.$row['IdBacklogs'].'").hide();
        $("#btnElimina_'.$row['IdBacklogs'].'").click(function(){                            
            
            $.ajax({
                type: "POST",
                url: \'http://localhost/dashboards/controladores/ajax_controlador.php\',
                data: jQuery.param( {id:"'.$row['IdBacklogs'].'",mod:"backlog",acc:"eliminar"}),
                contentType: \'application/x-www-form-urlencoded; charset=UTF-8\',
                cache: false,
                beforeSend: function(){
                    $("#loadingDiv_'.$row['IdBacklogs'].'").show();
                    $("#btnElimina_'.$row['IdBacklogs'].'").prop(\'disabled\', true);

                },
                success: function (result) {
                    alert(\'Backlog eliminado\');
                    document.location.href = \'main.php?pag=com_form_backlog\';
                },

                error: function(result){
                    alert(\'Problemas al eliminar Backlog\');
                    document.location.href = \'main.php?pag=com_form_backlog\';
                }
            });
        });
});        

</script>


';
}
?>

<!-- Modal Editar Backlog -->
<?php

foreach ($lista as $row)
{

    echo '<form method="post" id="form_edita_'.$row['IdBacklogs'].'" name="form_edita_'.$row['IdBacklogs'].'" >
<div class="modal fade" id="modal_edita_'.$row['IdBacklogs'].'" tabindex="-1" role="dialog" aria-labelledby="modal_'.$row['IdBacklogs'].'" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Editar Backlog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


<input type="hidden" id="IdBacklogs" name="IdBacklogs" value="'.$row['IdBacklogs'].'">
<input type="hidden" id="mod" name="mod" value="backlog">
<input type="hidden" id="acc" name="acc" value="editar">

                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Cliente</label>
                    <input type="text" class="form-control" id="nomCliente_'.$row['IdBacklogs'].'" name="nomCliente_'.$row['IdBacklogs'].'" aria-describedby="emailHelp" placeholder="Ingrese nombre del cliente" value="'.$row['Nom_Cli'].'">
                    <!-- <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">RUT Cliente</label>
                    <input type="text" class="form-control" id="rutCliente_'.$row['IdBacklogs'].'" name="rutCliente_'.$row['IdBacklogs'].'" placeholder="Ej: 76539289-K" value="'.$row['Rut_Cli'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre Proyecto</label>
                    <input type="text" class="form-control" id="nomProyecto_'.$row['IdBacklogs'].'" name="nomProyecto_'.$row['IdBacklogs'].'" placeholder="Ingrese el nombre del proyecto" value="'.$row['Nom_Proy'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fechaInicio_'.$row['IdBacklogs'].'" name="fechaInicio_'.$row['IdBacklogs'].'" value="'.$row['Fecha_Ini'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha Fin</label>
                    <input type="date" class="form-control" id="fechaFin_'.$row['IdBacklogs'].'" name="fechaFin_'.$row['IdBacklogs'].'" value="'.$row['Fecha_Fin'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Total del Proyecto</label>
                    <input type="number" class="form-control" id="totalProyecto_'.$row['IdBacklogs'].'" name="totalProyecto_'.$row['IdBacklogs'].'" placeholder="Ingrese el monto total del proyecto" value="'.$row['Tot_Proy'].'">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <select name="dropEstado_'.$row['IdBacklogs'].'" id="dropEstado_'.$row['IdBacklogs'].'" class="form-control">';



    foreach ($listaEstados as $row2) {
        if ($row['id_estado'] == $row2['Id_Dato']):
        echo '<option value="'.$row2['Id_Dato'].'" selected="selected">' . $row2['Valor_Dato'] . '</option>';
        else:
            echo '<option value="'.$row2['Id_Dato'].'" >' . $row2['Valor_Dato'] . '</option>';
        endif;
    }


    echo '</select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Notas</label>
                    <textarea  class="form-control" id="notas_'.$row['IdBacklogs'].'" name="notas_'.$row['IdBacklogs'].'" rows="4" cols="50" >'.$row['Notas_Proy'].'</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Empresa</label>
                    <select name="dropEmpresa_'.$row['IdBacklogs'].'" id="dropEmpresa_'.$row['IdBacklogs'].'" class="form-control">';
    foreach ($listaEmpresas as $key => $value)
    {
        if ($row['Id_Empresa'] == $key):
            echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
        else:
            echo '<option value="'.$key.'">'.$value.'</option>';
        endif;
    }


                    echo '</select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Centro de Costo</label>
                    <select name="dropCCO_'.$row['IdBacklogs'].'" id="dropCCO_'.$row['IdBacklogs'].'" class="form-control">
                        <option value="'.$row['CCO_Proy'].'" selected="selected">'.$row['CCO_Proy'].' - '.$row['nom_cco'].'</option>';
                        foreach ($listaCCO as $row3)
                        {
                            echo '<option value="'.$row3['codigo_cco'].'">'.$row3['codigo_cco'].' - '.$row3['nombre_cco'].'</option>';
                        }

                    echo '</select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardarBack_'.$row['IdBacklogs'].'" name="btnGuardarBack_'.$row['IdBacklogs'].'" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Backlog</button>
                <div id="loadingDiv_edita_'.$row['IdBacklogs'].'" name="loadingDiv_edita_'.$row['IdBacklogs'].'"> Trabajando ... <img src="http://ika.cl/extranet/html/images/loader/ajax-loader.gif"/>          </div><br>
            </div>
        </div>
    </div>
</div>
</form>
<br>
<script type="text/javascript">

$(document).ready(function(){ 
        $("#loadingDiv_edita_'.$row['IdBacklogs'].'").hide();
        $("#btnGuardarBack_'.$row['IdBacklogs'].'").click(function(){  
        
        var form = $(\'#form_edita_'.$row['IdBacklogs'].'\');
        var formData = $(form).serialize();                          
            
            $.ajax({
                type: "POST",
                url: \'http://localhost/dashboards/controladores/ajax_controlador.php\',
                data: formData,                
                cache: false,
                beforeSend: function(){
                    $("#loadingDiv_edita_'.$row['IdBacklogs'].'").show();
                    $("#loadingDiv_edita_'.$row['IdBacklogs'].'").prop(\'disabled\', true);

                },
                success: function (result) {
                    alert(\'Backlog Modificado\');
                    document.location.href = \'main.php?pag=com_form_backlog\';
                },

                error: function(result){
                    alert(\'Problemas al Editar\');
                    document.location.href = \'main.php?pag=com_form_backlog\';
                }
            });
        });
});        

</script>
';
}
?>




<!-- Modal Editar Backlog Fin -->


<!-- Modal Nuevo Backlog -->
<form method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Nuevo Backlog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Cliente</label>
                    <input type="text" class="form-control" id="nomCliente" name="nomCliente" aria-describedby="emailHelp" placeholder="Ingrese nombre del cliente">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">RUT Cliente</label>
                    <input type="text" class="form-control" id="rutCliente" name="rutCliente" placeholder="Ej: 76539289-K">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre Proyecto</label>
                    <input type="text" class="form-control" id="nomProyecto" name="nomProyecto" placeholder="Ingrese el nombre del proyecto">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Fecha Fin</label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Total del Proyecto</label>
                    <input type="number" class="form-control" id="totalProyecto" name="totalProyecto" placeholder="Ingrese el monto total del proyecto">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <select name="dropEstado" id="dropEstado" class="form-control">
                        <?php
                        foreach ($listaEstados as $row)
                        {
                            echo '<option value="'.$row['Id_Dato'].'">'.$row['Valor_Dato'].'</option>';
                        }
                        ?>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Notas</label>
                    <textarea  class="form-control" id="notas" name="notas" rows="4" cols="50"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Empresa</label>
                    <select name="dropEmpresa" id="dropEmpresa" class="form-control">
                        <?php

                        foreach ($listaEmpresas as $key => $value)
                        {
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                        ?>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Centro de Costo</label>
                    <select name="dropCCO" id="dropCCO" class="form-control">
                        <option value="-1" selected="selected">Sin CCO Asignado</option>
                        <?php
                        foreach ($listaCCO as $row)
                        {
                            echo '<option value="'.$row['codigo_cco'].'">'.$row['codigo_cco'].' - '.$row['nombre_cco'].'</option>';
                        }
                        ?>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Campo Opcional. Utilizado en proyectos activos.</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnGuardarBack" name="btnGuardarBack" class="btn btn-primary"><i class="fa fa-save"></i> Guardar Backlog</button>
            </div>
        </div>
    </div>
</div>
</form>








