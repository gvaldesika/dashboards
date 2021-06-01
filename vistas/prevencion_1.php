<?php
$listaIncidentes = PrevencionControlador::ctrObtenerIncidentes(date('Y'),date('m'));

?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4>Incidentes Reportados durante el Mes</h4><br>

                <div class="row">
                    <div class="col-sm-1">
                        <select class="form-control" name="dropAno" id="dropAno">
                            <option value="2022">2022</option>
                            <option value="2021" selected="selected">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <select class="form-control" name="dropMes" id="dropMes">
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="01">Mayo</option>
                            <option value="01">Junio</option>
                            <option value="01">Julio</option>
                            <option value="01">Agosto</option>
                            <option value="01">Septiembre</option>
                            <option value="01">Octubre</option>
                            <option value="01">Noviembre</option>
                            <option value="01">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-primary">Mostrar</button>
                    </div>
                </div>









<br><br>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Nro. Incidente</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Gravedad</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Tipo Personal</th>
                        <th scope="col">Fecha/Hora</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($listaIncidentes as $row) {
                        echo '<tr>';
                        echo '<td>'.$row['nro_incidente'].'</td>';
                        echo '<td>'.$row['clasificacion'].'</td>';
                        echo '<td>'.$row['gravedad'].'</td>';
                        echo '<td>'.$row['division'].'</td>';
                        echo '<td>'.$row['tipo_personal'].'</td>';
                        echo '<td>'.date('d-m-Y',strtotime($row['fecha_incidente'])).' '.$row['hora_incidente'].'</td>';

                        echo '</tr>';

                    }
                    ?>

                    </tbody>
                </table>




            </div>
        </div>
    </div>
</div>


