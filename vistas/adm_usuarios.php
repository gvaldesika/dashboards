<?php

$listaUsuarios = UsuariosControlador::ctrVerUsuarios(16);

$listaNuevos = UsuariosControlador::ctrVerUsuariosNuevos($listaUsuarios);

// Se activa al actualizar un permiso
if (isset($_POST) && isset($_POST['idusuario'])) {
    $permisos = array(
        'modAll' => (isset($_POST['modAll'])?1:0),
        'mod1' => (isset($_POST['mod1'])?1:0),
        'mod2' => (isset($_POST['mod2'])?1:0),
        'mod3' => (isset($_POST['mod3'])?1:0),
        'mod4' => (isset($_POST['mod4'])?1:0),
        'mod5' => (isset($_POST['mod5'])?1:0),
        'mod6' => (isset($_POST['mod6'])?1:0),
        'mod7' => (isset($_POST['mod7'])?1:0),
        'mod8' => (isset($_POST['mod8'])?1:0),
        'mod9' => (isset($_POST['mod9'])?1:0),
        'mod10' => (isset($_POST['mod10'])?1:0),
        'mod11' => (isset($_POST['mod11'])?1:0),
        'mod12' => (isset($_POST['mod12'])?1:0),
        'mod13' => (isset($_POST['mod13'])?1:0),
        'mod14' => (isset($_POST['mod14'])?1:0),
        'mod15' => (isset($_POST['mod15'])?1:0),
        'mod16' => (isset($_POST['mod16'])?1:0),
        'mod17' => (isset($_POST['mod17'])?1:0),
        'mod18' => (isset($_POST['mod18'])?1:0),
        'mod19' => (isset($_POST['mod19'])?1:0),
        'mod20' => (isset($_POST['mod20'])?1:0),
        'mod21' => (isset($_POST['mod21'])?1:0),
        'mod22' => (isset($_POST['mod22'])?1:0),
        'mod23' => (isset($_POST['mod23'])?1:0),
        'mod24' => (isset($_POST['mod24'])?1:0),
        'mod25' => (isset($_POST['mod25'])?1:0),
        'mod26' => (isset($_POST['mod26'])?1:0),
        'mod27' => (isset($_POST['mod27'])?1:0),
        'mod28' => (isset($_POST['mod28'])?1:0),
        'mod29' => (isset($_POST['mod29'])?1:0),
        'mod30' => (isset($_POST['mod30'])?1:0),
        'mod31' => (isset($_POST['mod31'])?1:0),
        'mod32' => (isset($_POST['mod32'])?1:0),
        'mod33' => (isset($_POST['mod33'])?1:0),
        'mod34' => (isset($_POST['mod34'])?1:0),
        'mod35' => (isset($_POST['mod35'])?1:0),
        'mod36' => (isset($_POST['mod36'])?1:0),
        'mod37' => (isset($_POST['mod37'])?1:0),
        'mod38' => (isset($_POST['mod38'])?1:0),
        'mod39' => (isset($_POST['mod39'])?1:0),
        'mod40' => (isset($_POST['mod40'])?1:0),
        'mod41' => (isset($_POST['mod41'])?1:0),
        'mod43' => (isset($_POST['mod43'])?1:0),
        'mod44' => (isset($_POST['mod44'])?1:0),
        'mod45' => (isset($_POST['mod45'])?1:0),
        'mod46' => (isset($_POST['mod46'])?1:0),
        'mod47' => (isset($_POST['mod47'])?1:0),
        'mod48' => (isset($_POST['mod48'])?1:0),
        'mod49' => (isset($_POST['mod49'])?1:0)
    );

    /*
    foreach ($_POST as $key => $value) {
        echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    }*/

    $res = new UsuariosControlador();
    $retorno = $res->ctrActualizarPermisos($_POST['idusuario'],$permisos);
    if ($retorno == 'ok') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa fa-check"> </i> Permisos actualizados
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-close"> </i> Problemas al Actualizar Permisos
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}



// Seactiva al eliminar un Usuario
if (isset($_POST) && isset($_POST['idelimina'])) {

    $res = new UsuariosControlador();
    $retorno = $res->ctrEliminaAccesoUsuario($_POST['idelimina']);
    if ($retorno == 'ok') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa fa-check"> </i> Usuario Eliminado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        echo '<script>
                        window.location = "main.php?pag=adm_usuarios";
                    </script>';
    }else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-close"> </i> Problemas al Eliminar el Usuario
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }


}


if (isset($_POST['btnNewUser']))
{
    $res = new UsuariosControlador();
    $retorno = $res->ctrNuevoUsuario($_POST['dropNuevoUsr']);
    if ($retorno == 'ok') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa fa-check"> </i> Usuario Agregado. Se deben configurar los permisos de acceso
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        echo '<script>
                        window.location = "main.php?pag=adm_usuarios";
                    </script>';
    }else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-close"> </i> Problemas al agregar usuario
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

}


?>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Usuarios del Sistema</h3></center>
            <br><br>

            <button type="button" name="btnAddUser" id="btnAddUser" data-toggle="modal" data-target="#modalNuevoUsuario" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Usuario</button>
            <br><br>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Cod. Operador</th>
                    <th scope="col">Cod. Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($listaUsuarios as $row)
                {
                    echo '<tr>';
                    echo '<td>'.$row['Cod_Operador'].'</td>';
                    echo '<td>'.$row['Id_Usuario'].'</td>';
                    echo '<td>'.$row['Nombres'].' '.$row['Apellidos'].'</td>';
                    echo '<td>'.$row['Correo'].'</td>';
                    //echo '<td><a class="btn btn-primary" href="main.php?pag=adm_permisos_usuario&idusuario='.$row['Id_Usuario'].'" target="_blank"><i class="fa fa-key"></i></a></td>';
                    echo '<td><button data-placement="top" title="Ver Permisos" type="button" data-toggle="modal" data-target="#modal_'.$row['Id_Usuario'].'" class="btn btn-primary" ><i class="fa fa-key"></i></button>
                            <button data-placement="top" title="Eliminar" type="button" data-toggle="modal" data-target="#elimina_'.$row['Id_Usuario'].'" class="btn btn-danger" ><i class="fa fa-trash"></i></button></td>';


                    echo '</tr>';
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>
</div>




<?php

// Modales Elimina Usuario

foreach ($listaUsuarios as $row)
{
    echo '<div class="modal fade" id="elimina_'.$row['Id_Usuario'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning"></i> Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
        ¿Seguro desea eliminar al usuario '.$row['Nombres'].'?
        
        <input type="hidden" id="idelimina" name="idelimina" value="'.$row['Id_Usuario'].'">
      </div>
      <div class="modal-footer">
      <form method="post">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>';
}


// MOdales Permisos
foreach ($listaUsuarios as $row)
{
    $permisos = UsuariosControlador::ctrVerAccesosUsuario($row['Id_Usuario']);
    //var_dump($permisos);

    echo '<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modal_'.$row['Id_Usuario'].'" tabindex="-1" role="dialog" aria-labelledby="modal_'.$row['Id_Usuario'].'" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar permisos de '.$row['Nombres'].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">';
    echo '<form method="post">
<input type="hidden" id="idusuario" name="idusuario" value="'.$row['Id_Usuario'].'">
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Pagina/Informe</th>
                    <th scope="col">Menú Padre</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Estado</th>
                </tr>
                </thead>
                <tbody>

                <!-- Cada Fila representa un informe o pagina en el sistema-->
                <tr class="table-secondary">
                    <td>Acceso Completo</td>
                    <td>*</td>
                    <td></td>
                    <td>'.($permisos['modAll']==1 ? '<input type="checkbox" id="modAll" name="modAll" value="modAll" checked="checked">' : '<input type="checkbox" id="modAll" name="modAll">').'</td>
                </tr>

                <tr>
                    <td>Nueva Tocopilla</td>
                    <td>Operaciones</td>
                    <td></td>
                    <td>'.($permisos['mod1']==1 ? '<input type="checkbox" id="mod1" name="mod1" value="mod1" checked="checked">' : '<input type="checkbox" id="mod1" name="mod1">').'</td>
                </tr>
                <tr>
                    <td>Cosecha de Sales</td>
                    <td>Operaciones</td>
                    <td></td>
                    <td>'.($permisos['mod2']==1 ? '<input type="checkbox" id="mod2" name="mod2" value="mod2" checked="checked">' : '<input type="checkbox" id="mod2" name="mod2">') .'</td>
                </tr>
                <tr>
                    <td>Cantera Las Casas</td>
                    <td>Operaciones</td>
                    <td></td>
                    <td>'. ($permisos['mod3']==1 ? '<input type="checkbox" id="mod3" name="mod3" value="mod3" checked="checked">' : '<input type="checkbox" id="mod3" name="mod3">') .'</td>
                </tr>

                <!-- Adm. y Finanzas -->

                <tr>
                    <td>Consolidado</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod4']==1 ? '<input type="checkbox" id="mod4" name="mod4" value="mod4" checked="checked">' : '<input type="checkbox" id="mod4" name="mod4">') .'</td>
                </tr>
                <tr>
                    <td>Consolidado (Ind+Min+Maq)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod5']==1 ? '<input type="checkbox" id="mod5" name="mod5" value="mod5" checked="checked">' : '<input type="checkbox" id="mod5" name="mod5">').'</td>
                </tr>
                <tr>
                    <td>Consolidado (Ind+Min)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod6']==1 ? '<input type="checkbox" id="mod6" name="mod6" value="mod6" checked="checked">' : '<input type="checkbox" id="mod6" name="mod6">') .'</td>
                </tr>
                <tr>
                    <td>Consolidado (Infraestructura)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod7']==1 ? '<input type="checkbox" id="mod7" name="mod7" value="mod7" checked="checked">' : '<input type="checkbox" id="mod7" name="mod7">').'</td>
                </tr>
                <tr>
                    <td>Consolidado (Minería)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod8']==1 ? '<input type="checkbox" id="mod8" name="mod8" value="mod8" checked="checked">' : '<input type="checkbox" id="mod8" name="mod8">') .'</td>
                </tr>
                <tr>
                    <td>Consolidado (Industrial)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod9']==1 ? '<input type="checkbox" id="mod9" name="mod9" value="mod9" checked="checked">' : '<input type="checkbox" id="mod9" name="mod9">').'</td>
                </tr>
                <tr>
                    <td>UN. Industrial</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod10']==1 ? '<input type="checkbox" id="mod10" name="mod10" value="mod10" checked="checked">' : '<input type="checkbox" id="mod10" name="mod10">').'</td>
                </tr>
                <tr>
                    <td>UN. Minería</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod11']==1 ? '<input type="checkbox" id="mod11" name="mod11" value="mod11" checked="checked">' : '<input type="checkbox" id="mod11" name="mod11">') .'</td>
                </tr>
                <tr>
                    <td>UN. Infraestructura</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod12']==1 ? '<input type="checkbox" id="mod12" name="mod12" value="mod12" checked="checked">' : '<input type="checkbox" id="mod12" name="mod12">') .'</td>
                </tr>
                <tr>
                    <td>Adm. y Ventas</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod13']==1 ? '<input type="checkbox" id="mod13" name="mod13" value="mod13" checked="checked">' : '<input type="checkbox" id="mod13" name="mod13">') .'</td>
                </tr>
                <tr>
                    <td>Gerencia Activos</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod14']==1 ? '<input type="checkbox" id="mod14" name="mod14" value="mod14" checked="checked">' : '<input type="checkbox" id="mod14" name="mod14">') .'</td>
                </tr>
                <tr>
                    <td>Mantención</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod15']==1 ? '<input type="checkbox" id="mod15" name="mod15" value="mod15" checked="checked">' : '<input type="checkbox" id="mod15" name="mod15">') .'</td>
                </tr>
                <tr>
                    <td>Maquinaria</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod16']==1 ? '<input type="checkbox" id="mod16" name="mod16" value="mod16" checked="checked">' : '<input type="checkbox" id="mod16" name="mod16">') .'</td>
                </tr>
                <tr>
                    <td>Maquinaria ($USD)</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod17']==1 ? '<input type="checkbox" id="mod17" name="mod17" value="mod17" checked="checked">' : '<input type="checkbox" id="mod17" name="mod17">') .'</td>
                </tr>
                <tr>
                    <td>Obras</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod18']==1 ? '<input type="checkbox" id="mod18" name="mod18" value="mod18" checked="checked">' : '<input type="checkbox" id="mod18" name="mod18">') .'</td>
                </tr>
                <tr>
                    <td>Publicar Resultados Financieros</td>
                    <td>Adm. y Finanzas</td>
                    <td></td>
                    <td>'. ($permisos['mod19']==1 ? '<input type="checkbox" id="mod19" name="mod19" value="mod19" checked="checked">' : '<input type="checkbox" id="mod19" name="mod19">') .'</td>
                </tr>
                <!-- Maquinaria -->
                <tr>
                    <td>Disponibilidad Equipos</td>
                    <td>Maquinaria</td>
                    <td></td>
                    <td>'. ($permisos['mod20']==1 ? '<input type="checkbox" id="mod20" name="mod20" value="mod20" checked="checked">' : '<input type="checkbox" id="mod20" name="mod20">') .'</td>
                </tr>
                <tr>
                    <td>Arriendo Equipos</td>
                    <td>Maquinaria</td>
                    <td></td>
                    <td>'. ($permisos['mod21']==1 ? '<input type="checkbox" id="mod21" name="mod21" value="mod21" checked="checked">' : '<input type="checkbox" id="mod21" name="mod21">') .'</td>
                </tr>
                <!-- Prevención y SGI -->
                <tr>
                    <td>Incidentes Mes</td>
                    <td>Prevención y SGI</td>
                    <td></td>
                    <td>'. ($permisos['mod22']==1 ? '<input type="checkbox" id="mod22" name="mod22" value="mod22" checked="checked">' : '<input type="checkbox" id="mod22" name="mod22">') .'</td>
                </tr>
                <tr>
                    <td>Reportabilidad Inc. (Antiguo)</td>
                    <td>Prevención y SGI</td>
                    <td></td>
                    <td>'. ($permisos['mod23']==1 ? '<input type="checkbox" id="mod23" name="mod23" value="mod23" checked="checked">' : '<input type="checkbox" id="mod23" name="mod23">') .'</td>
                </tr>
                <tr>
                    <td>Reportabilidad Inc.</td>
                    <td>Prevención y SGI</td>
                    <td></td>
                    <td>'. ($permisos['mod24']==1 ? '<input type="checkbox" id="mod24" name="mod24" value="mod24" checked="checked">' : '<input type="checkbox" id="mod24" name="mod24">') .'</td>
                </tr>
                <!-- RR.HH -->
                <tr>
                    <td>Informe Hrs. Extra</td>
                    <td>RR.HH</td>
                    <td></td>
                    <td>'. ($permisos['mod25']==1 ? '<input type="checkbox" id="mod25" name="mod25" value="mod25" checked="checked">' : '<input type="checkbox" id="mod25" name="mod25">') .'</td>
                </tr>
                <tr>
                    <td>Informe Head Count</td>
                    <td>RR.HH</td>
                    <td></td>
                    <td>'. ($permisos['mod26']==1 ? '<input type="checkbox" id="mod26" name="mod26" value="mod26" checked="checked">' : '<input type="checkbox" id="mod26" name="mod26">') .'</td>
                </tr>
                <tr>
                    <td>Cargar Horas Extra</td>
                    <td>RR.HH</td>
                    <td></td>
                    <td>'. ($permisos['mod27']==1 ? '<input type="checkbox" id="mod27" name="mod27" value="mod27" checked="checked">' : '<input type="checkbox" id="mod27" name="mod27">') .'</td>
                </tr>
                <tr>
                    <td>Cargar Datos Talana</td>
                    <td>RR.HH</td>
                    <td></td>
                    <td>'.($permisos['mod28']==1 ? '<input type="checkbox" id="mod28" name="mod28" value="mod28" checked="checked">' : '<input type="checkbox" id="mod28" name="mod28">') .'</td>
                </tr>
                <!-- Comercial -->
                <tr>
                    <td>Presupuesto</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod29']==1 ? '<input type="checkbox" id="mod29" name="mod29" value="mod29" checked="checked">' : '<input type="checkbox" id="mod29" name="mod29">') .'</td>
                </tr>
                <tr>
                    <td>Presupuesto (Minería + Industrial)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod46']==1 ? '<input type="checkbox" id="mod46" name="mod46" value="mod46" checked="checked">' : '<input type="checkbox" id="mod46" name="mod46">') .'</td>
                </tr>
                <tr>
                    <td>Presupuesto (Minería e Industrial)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod30']==1 ? '<input type="checkbox" id="mod30" name="mod30" value="mod30" checked="checked">' : '<input type="checkbox" id="mod30" name="mod30">') .'</td>
                </tr>
                <tr>
                    <td>Presupuesto (Infraestructura)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod31']==1 ? '<input type="checkbox" id="mod31" name="mod31" value="mod31" checked="checked">' : '<input type="checkbox" id="mod31" name="mod31">') .'</td>
                </tr>
                <tr>
                    <td>Diversificación Ingresos</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'.($permisos['mod32']==1 ? '<input type="checkbox" id="mod32" name="mod32" value="mod32" checked="checked">' : '<input type="checkbox" id="mod32" name="mod32">') .'</td>
                </tr>
                <tr>
                    <td>Backlog Total</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'.($permisos['mod33']==1 ? '<input type="checkbox" id="mod33" name="mod33" value="mod33" checked="checked">' : '<input type="checkbox" id="mod33" name="mod33">') .'</td>
                </tr>
                <tr>
                    <td>Backlog (Minería+Industrial)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod34']==1 ? '<input type="checkbox" id="mod34" name="mod34" value="mod34" checked="checked">' : '<input type="checkbox" id="mod34" name="mod34">') .'</td>
                </tr>
                <tr>
                    <td>Backlog (Minería)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod35']==1 ? '<input type="checkbox" id="mod35" name="mod35" value="mod35" checked="checked">' : '<input type="checkbox" id="mod35" name="mod35">') .'</td>
                </tr>
                <tr>
                    <td>Backlog (Industrial)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'.($permisos['mod36']==1 ? '<input type="checkbox" id="mod36" name="mod36" value="mod36" checked="checked">' : '<input type="checkbox" id="mod36" name="mod36">') .'</td>
                </tr>
                <tr>
                    <td>Backlog (Infraestructura)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod37']==1 ? '<input type="checkbox" id="mod37" name="mod37" value="mod37" checked="checked">' : '<input type="checkbox" id="mod37" name="mod37">') .'</td>
                </tr>
                <tr>
                    <td>Backlog Tabla</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod38']==1 ? '<input type="checkbox" id="mod38" name="mod38" value="mod38" checked="checked">' : '<input type="checkbox" id="mod38" name="mod38">') .'</td>
                </tr>
                <tr>
                    <td>Backlog Tabla (Min+Ind)</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod39']==1 ? '<input type="checkbox" id="mod39" name="mod39" value="mod39" checked="checked">' : '<input type="checkbox" id="mod39" name="mod39">') .'</td>
                </tr>
                <tr>
                    <td>Ingreso Budget</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod40']==1 ? '<input type="checkbox" id="mod40" name="mod40" value="mod40" checked="checked">' : '<input type="checkbox" id="mod40" name="mod40">') .'</td>
                </tr>
                <tr>
                    <td>Análisis de CCO</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod41']==1 ? '<input type="checkbox" id="mod41" name="mod41" value="mod41" checked="checked">' : '<input type="checkbox" id="mod41" name="mod41">') .'</td>
                </tr>
                <tr>
                    <td>Editor Backlog</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod43']==1 ? '<input type="checkbox" id="mod43" name="mod43" value="mod43" checked="checked">' : '<input type="checkbox" id="mod43" name="mod43">') .'</td>
                </tr>
                <tr>
                    <td>Administrar Usuarios</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod44']==1 ? '<input type="checkbox" id="mod44" name="mod44" value="mod44" checked="checked">' : '<input type="checkbox" id="mod44" name="mod44">') .'</td>
                </tr>
                

                
                                <tr>
                    <td>Nva. Victoria (Directorio)</td>
                    <td>Operaciones</td>
                    <td></td>
                    <td>'. ($permisos['mod47']==1 ? '<input type="checkbox" id="mod47" name="mod47" value="mod47" checked="checked">' : '<input type="checkbox" id="mod47" name="mod47">') .'</td>
                </tr>
                                <tr>
                    <td>Nva. Tocopilla(Directorio)</td>
                    <td>Operaciones</td>
                    <td></td>
                    <td>'. ($permisos['mod48']==1 ? '<input type="checkbox" id="mod48" name="mod48" value="mod48" checked="checked">' : '<input type="checkbox" id="mod48" name="mod48">') .'</td>
                </tr>
                                <tr>
                    <td>Cumplimiento Budget</td>
                    <td>Comercial</td>
                    <td></td>
                    <td>'. ($permisos['mod49']==1 ? '<input type="checkbox" id="mod49" name="mod49" value="mod49" checked="checked">' : '<input type="checkbox" id="mod49" name="mod49">') .'</td>
                </tr>


                </tbody>

            </table>
            ';




      echo '</div>
      <div class="modal-footer">
             <button type="submit" name="btnActualizar" id="btnActualizar" class="btn btn-primary"><i class="fa fa-refresh"></i> Actualizar</button>
             <button type="button" name="btnCerrar" id="btnCerrar" class="btn btn-secondary" data-dismiss="modal" ><i class="fa fa-close"></i> Cerrar</button>
             </form>
      </div>
    </div>
  </div>
</div>';

}

?>



<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="modalNuevoUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Seleccione un usuario para concederle acceso al sistema</label>
                    <select name="dropNuevoUsr" id="dropNuevoUsr">
                        <?php
                        foreach ($listaNuevos as $row)
                        {
                            echo '<option value="'.$row['Id_Usuario'].'">'.$row['Id_Usuario'].' - '.$row['nombre'].'</option>';
                        }
                        ?>
                    </select>
                    <!-- <small id="emailHelp" class="form-text text-muted">El usuario debe estar ya registrado en IKA GES</small> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" name="btnNewUser" id="btnNewUser" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                <button type="submit" name="btnNewUser" id="btnNewUser" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
