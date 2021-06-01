<?php
$version = AuxiliaresControlador::ctrVerUltimaActualizacion();

$actual = date('d-m-Y',strtotime($version[0])).' - '.date('H:m',strtotime($version[0]));


?>
<div class="content mt-3">

    <div class="row">
        <div class="col-sm-3">
            <div class="card" >
                <img class="card-img-top" src="html/images/datos.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Información Data Warehouse</h5>
                    <p class="card-text"><i class="fa fa-arrow-right"></i> <b>Ultima Act.:</b> <?php echo $actual; ?>Hrs.</p>
                    <p class="card-text"><i class="fa fa-arrow-right"></i> <b>Estado:</b> En Línea <img  src="html/images/verde.png" alt="Card image cap" height="20" width="20"> </p>
                </div>
            </div>
        </div>
    </div>

</div>