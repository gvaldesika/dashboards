<?php
$lista = TablasControlador::ctrObtenerCCO();

$listaCCO = AuxiliaresControlador::ctrVerTodosCCO();



?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Análisis Adicionales para CCO</h3><br><br>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Agregar CCO
            </button><br><br>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">CCO</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Industria</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($lista as $row)
                {
                    echo '<tr>';
                    echo '<td>'.$row['Id_Dato'].'</td>';
                    echo '<td>'.$row['Valor_Dato'].'</td>';
                    echo '<td>'.$row['Analisis_Texto_1'].'</td>';
                    echo '<td>'.$row['Analisis_Texto_2'].'</td>';
                    echo '<td>'.$row['Analisis_Texto_3'].'</td>';
                    echo '</tr>';

                }
                ?>


                </tbody>
            </table>





        </div>
    </div>
</div>


<!-- Modales -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo CCO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Seleccione CCO</label>
                        <select name="dropCCO" id="dropCCO" class="form-control">
                            <?php
                            foreach ($listaCCO as $row)
                            {
                                echo '<option value="'.$row['codigo_cco'].'">'.$row['codigo_cco'].' - '.$row['nombre_cco'].'</option>';

                            }

                            ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Clientes</label>
                        <select name="dropZona" id="dropClientes" class="form-control">
                            <option value="Albemarle">Albemarle</option>
                            <option value="SQM">SQM</option>
                            <option value="AES Gener">AES Gener</option>
                            <option value="ENEL">ENEL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Zona</label>
                        <select name="dropZona" id="dropIndustria" class="form-control">
                            <option value="Norte">Norte</option>
                            <option value="Centro">Centro</option>
                            <option value="Sur">Sur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Industria</label>
                        <select name="dropCCO" id="dropIndustria" class="form-control">
                            <option value="Energía">Energía</option>
                            <option value="Minería">Minería</option>
                            <option value="Cemento">Cemento</option>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>