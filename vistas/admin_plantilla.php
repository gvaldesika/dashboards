<?php
require_once 'controladores/login.controlador.php';

if(isset($_POST['btnSalir']))
{
    $variable = new LoginControlador();
    $variable->ctrTerminaSesion();
    echo '<script>
                       window.location = "https://legacy.ika-hub.cl/app";
                    </script>';
}
$login = LoginControlador::validaLoginPagina();


// Valida los menús activos del usuario
$permisos = $_SESSION['permisos'];

$estilOculto = 'style="visibility: hidden; display: none; !important;"';
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboards</title>
    <meta name="description" content="Intranet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="repositorio/css/index.css">
    <link rel="stylesheet" href="html/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="html/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>




    <link rel="apple-touch-icon" href="/html/apple-icon.png">
    <link rel="shortcut icon" href="/html/favicon.ico">

    <!-- <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css"> -->
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->


    <link rel="stylesheet" href="html/assets/css/style.css">
    <!-- <script src="https://kit.fontawesome.com/d477825c69.js" crossorigin="anonymous"></script> -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(http://sistemas.ika-hub.cl/extranet/html/images/loader/Preloader_5.gif) center no-repeat #fff;
            opacity: 0.8;
        }

        .cargando{
            position: absolute;
            width: 100px;
            height: 50px;
            top: 50%;
            left: 50%;
            margin-left: -50px; /* margin is -0.5 * dimension */
            margin-top: -25px;
        }

    </style>

    <style>
        .floating-button-menu {
            z-index: 5;
            position: fixed;
            bottom: 40px;
            right: 40px;
            cursor: pointer;
            background: #F35A5A;
            border-radius: 50%;
            min-width: 80px;
            max-width: 0px;
            min-height: 80px;
            max-height: 0px;
            box-shadow: 2px 2px 8px 2px rgba(0,0,0,.6);
            transition: all ease-in-out .3s;
        &:hover {
             background: #fff;
         }
        .floating-button-menu-links {
            width: 0;
            height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all .4s;
        a {
            position: relative;
            color: #454545;
            text-transform: uppercase;
            text-decoration: none;
            line-height: 50px;
            display: block;
            display: block;
            border-bottom: 1px solid #ccc;
            width: 100%;
            height: 50px;
            padding: 0 20px;
            border-bottom: 1px solid #ccc;
            transition: background ease-in-out .3s;
            background: rgba(0,0,0,0);
        &:hover {
             background: rgba(0,0,0,.1)
         }
        &:last-child {
             border-bottom: 0px solid #fff;
         }
        }
        &.menu-on {
             background: #fff;
             width: 450px;
             height: 400px;
             border-radius: 10px;
             opacity: 1;
             transition: all ease-in-out .5s;
         }

        }
        .floating-button-menu-label {
            text-align: center;
            line-height: 74px;
            font-size: 50px;
            color: #fff;
            opacity: 1;
            transition: opacity .3s;
        }
        &.menu-on {
             background: #fff;
             max-width: 340px;
             max-height: 3300px;
             border-radius: 10px;
        .floating-button-menu-links {
            width: 100%;
            height: 100%;
            opacity: 1;
            transition: all ease-in-out 1s;
        }
        .floating-button-menu-label {
            height: 0px;
            overflow: hidden;
        }
        }
        }
        .floating-button-menu-close {
            position: fixed;
            z-index: 2;
            width: 0%;
            height: 0%;
        &.menu-on {
             width: 100%;
             height: 100%;
             background: rgba(0,0,0,.1);
         }
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <style>
        .menutoggle {
            background: #c22520 !important;
            border-radius: 50%;
            color: #fff !important;
            cursor: pointer;
            font-size: 18px;
            height: 43px;
            line-height: 44px;
            margin: -2px 20px 0 -57px;
            text-align: center;
            width: 43px;
        }
    </style>




</head>
<script>
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<body>

<div class="se-pre-con">

    <div class="cargando">Cargando ...</div></div>

<!-- Left Panel -->


<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
            </button>
            <a class="navbar-brand" href="main.php?pag=dashboard"><img src="repositorio/logos/dashboard_logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="main.php?pag=dashboard"><img src="repositorio/logos/dashboard_logo.png" alt="Logo"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">

                    <a href="main.php?pag=dashboard"> <i class="menu-icon fa fa-tachometer"></i>Dashboard </a>
                </li>




                <!-- Menú Operaciones  -->
                <?php
                $menuOperaciones = '';
                if($permisos['mod1'] == 0 && $permisos['mod2']==0 && $permisos['mod3']==0 && $permisos['modAll']==0)
                {
                    $menuOperaciones = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuOperaciones; ?>  ><i class="menu-icon fa fa-truck"></i> Operaciones</h3>
                    <li class="menu-item-has-children dropdown"  <?php echo $menuOperaciones; ?> >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Faenas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php echo ($permisos['mod1']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-pie-chart"></i><a href="main.php?pag=powerbi_op_nvatocopilla">Nva. Tocopilla (526)</a></li>':'' ?>
                            <?php echo ($permisos['mod2']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-pie-chart"></i><a href="main.php?pag=powerbi_op_cosechasales">Cosecha de Sales (534)</a></li>':'' ?>
                            <?php echo ($permisos['mod3']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-pie-chart"></i><a href="main.php?pag=powerbi_op_clc">Cantera Las Casas (528)</a></li>':'' ?>
                        </ul>
                    </li>

                <li class="menu-item-has-children dropdown"  <?php echo $menuOperaciones; ?> >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Directorio</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-pie-chart"></i><a href="main.php?pag=op_dir_nvavictoria">Nva. Victoria</a></li>

                    </ul>
                </li>

                <!-- Menú Operaciones -->


                <!-- Menú Adm. y Finanzas -->
                <?php
                $menuFinanzas = '';
                if($permisos['mod4'] == 0 && $permisos['mod5']==0 && $permisos['mod6']==0 && $permisos['mod7']==0 && $permisos['mod8']==0 && $permisos['mod9']==0 && $permisos['mod10']==0
                    && $permisos['mod11']==0 && $permisos['mod12']==0 && $permisos['mod13']==0 && $permisos['mod14']==0 && $permisos['mod15']==0 && $permisos['mod16']==0 && $permisos['mod17']==0
                    && $permisos['mod18']==0 && $permisos['mod19']==0 && $permisos['modAll']==0)
                {
                    $menuFinanzas = $estilOculto;
                }
                ?>

    <h3 class="menu-title" <?php echo $menuFinanzas; ?>><i class="menu-icon fa fa-money"></i> Adm. y Finanzas</h3>

<li class="menu-item-has-children dropdown" <?php echo $menuFinanzas; ?>>
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Directorio</a>
  <ul class="sub-menu children dropdown-menu">
      <?php echo ($permisos['mod4']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado"> Consolidado</a></li>':'' ?>
      <!-- <?php echo ($permisos['mod5']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado_ind_min_maq"> Consolidado (Ind+Min+Maq)</a></li>':'' ?> -->
      <!--<?php echo ($permisos['mod6']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado_ind_min"> Consolidado (Ind+Min)</a></li>':'' ?> -->
      <!--<?php echo ($permisos['mod7']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado_infra">Consolidado (Infra) </a></li>':'' ?> -->

      <!--<?php echo ($permisos['mod8']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado_min">Consolidado (Min)</a></li>':'' ?> -->

      <!--<?php echo ($permisos['mod9']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_consolidado_ind"> Consolidado (Ind)</a></li>':'' ?> -->

      <?php echo ($permisos['mod10']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_unindustrial"> UN Industrial</a></li>':'' ?>
      <?php echo ($permisos['mod11']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_unmineria"> UN Minería</a></li>':'' ?>
      <?php echo ($permisos['mod12']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_uninfraestructura"> UN Infraest.</a></li>':'' ?>

      <?php echo ($permisos['mod13']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_admyventas"> Adm. y Ventas</a></li>':'' ?>
      <?php echo ($permisos['mod14']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_gactivos"> G. Activos</a></li>':'' ?>
      <?php echo ($permisos['mod15']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_mantencion"> Mantención</a></li>':'' ?>

      <?php echo ($permisos['mod16']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_maquinaria"> Maquinaria</a></li>':'' ?>
      <?php echo ($permisos['mod17']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_maquinaria_usd"> Maquinaria ($USD)</a></li>':'' ?>
      <?php echo ($permisos['mod18']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=fi_inf_obras"> Obras</a></li>':'' ?>
  </ul>
</li>
                <li class="menu-item-has-children dropdown" <?php echo $menuFinanzas; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Configuración</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod19']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-check"></i><a href="main.php?pag=com_form_publica_fi"> Publicar Resultados</a></li>':'' ?>
                    </ul>
                </li>

                <!-- Menú Adm. y Finanzas -->


                <!-- Menú Maquinaria -->
                <?php
                $menuMaquinaria = '';
                if($permisos['mod20'] == 0 && $permisos['mod21']==0 && $permisos['modAll']==0)
                {
                    $menuMaquinaria = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuMaquinaria; ?>><i class="menu-icon fa fa-truck"></i> Maquinaria</h3>
                <li class="menu-item-has-children dropdown" <?php echo $menuMaquinaria; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>PowerBI</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod20']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-pie-chart"></i><a href="main.php?pag=powerbi_maq_disponibilidad">Disp. Equipos</a></li>':'' ?>
                        <?php echo ($permisos['mod21']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-pie-chart"></i><a href="main.php?pag=powerbi_maq_arriendo">Ingresos Arriendo</a></li>':'' ?>
                    </ul>
                </li>
                <!-- Menú Maquinaria -->

                <!-- Menú Prevención y SGI -->
                <?php
                $menuSGI = '';
                if($permisos['mod22'] == 0 && $permisos['mod23']==0 && $permisos['mod24']==0 && $permisos['modAll']==0)
                {
                    $menuSGI = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuSGI; ?>><i class="menu-icon fa fa-user"></i> Prevención y SGI</h3>
                <li class="menu-item-has-children dropdown" <?php echo $menuSGI; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Directorio</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod22']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=prevencion_1"> Incidentes x Mes</a></li>':'' ?>
                        <?php echo ($permisos['mod23']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=prevencion_2"> Rep. Incidentes x Obra</a></li>':'' ?>
                        <?php echo ($permisos['mod24']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=prevencion_3"> Rep. Tipo Incidente</a></li>':'' ?>
                    </ul>
                </li>
                <!-- Menú Prevención y SGI -->


                <!-- Menú Personal -->
                <?php
                $menuPersonal = '';
                if($permisos['mod25'] == 0 && $permisos['mod26']==0 && $permisos['mod27'] == 0 && $permisos['mod28']==0 && $permisos['modAll']==0)
                {
                    $menuPersonal = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuPersonal; ?>><i class="menu-icon fa fa-users"></i> Personal</h3>
                <li class="menu-item-has-children dropdown" <?php echo $menuPersonal; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Informes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod25']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=rrhh_inf_hrsextra"> Hrs. Extra. Sem.</a></li>':'' ?>
                        <?php echo ($permisos['mod26']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=rrhh_inf_cargosmensual"> Head Count</a></li>':'' ?>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown" <?php echo $menuPersonal; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Configuración</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod27']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-wrench"></i><a href="main.php?pag=rrhh_form_hrsextra"> Ingreso Hrs. Ext.</a></li>':'' ?>
                        <?php echo ($permisos['mod28']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-wrench"></i><a href="main.php?pag=rrhh_form_talana"> Datos de Talana</a></li>':'' ?>
                    </ul>
                </li>
                <!-- Menú Personal -->


                <!-- Menú COmercial -->
                <?php
                $menuComercial = '';
                if($permisos['mod29'] == 0 && $permisos['mod46']==0 && $permisos['mod30']==0 && $permisos['mod30']==0 && $permisos['mod32']==0 && $permisos['mod33']==0 && $permisos['mod34']==0
                    && $permisos['mod35']==0 && $permisos['mod36']==0 && $permisos['mod37']==0 && $permisos['mod38']==0 && $permisos['mod39']==0 && $permisos['mod40']==0 && $permisos['mod41']==0
                    && $permisos['mod43']==0 && $permisos['mod49']==0 && $permisos['modAll']==0)
                {
                    $menuComercial = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuComercial; ?>><i class="menu-icon fa fa-dollar"></i> Comercial</h3>
                 <li class="menu-item-has-children dropdown" <?php echo $menuComercial; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pie-chart"></i>Directorio</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod29']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_real_budget"> Ventas Real V/S Budget</a></li>':'' ?>
                        <?php echo ($permisos['mod46']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_real_budget_min_ind"> Ventas Real V/S Budget (Industrial+Mineria)</a></li>':'' ?>
                        <?php echo ($permisos['mod30']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_real_budget_un"> Ventas Real V/S Budget (Industrial y Mineria)</a></li>':'' ?>
                        <?php echo ($permisos['mod31']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_real_budget_un_infra"> Ventas Real V/S Budget (Infraestructura)</a></li>':'' ?>

                        <?php echo ($permisos['mod32']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_diversific_budget"> Diversificación Ingresos </a></li>':'' ?>
                        <?php echo ($permisos['mod33']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_total"> Backlog Consolidado</a></li>':'' ?>
                        <?php echo ($permisos['mod34']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog"> Backlog (Industrial y Mineria)</a></li>':'' ?>
                        <?php echo ($permisos['mod35']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_min"> Backlog (Mineria)</a></li>':'' ?>

                        <?php echo ($permisos['mod36']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_ind"> Backlog (Industrial)</a></li>':'' ?>
                        <?php echo ($permisos['mod37']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_infra"> Backlog (Infraestructura)</a></li>':'' ?>
                        <?php echo ($permisos['mod38']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_tabla"> Backlog (Tabla)</a></li>':'' ?>
                        <?php echo ($permisos['mod39']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_backlog_tabla_ind_min"> Backlog Industrial y Minería (Tabla)</a></li>':'' ?>
                        <?php echo ($permisos['mod49']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-bar-chart"></i><a href="main.php?pag=com_inf_cump_budg_tabla"> Cumplimiento Budget</a></li>':'' ?>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown" <?php echo $menuComercial; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Configuración</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod40']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-table"></i><a href="main.php?pag=com_form_ingresobudget"> Ingreso Budget</a></li>':'' ?>
                        <?php echo ($permisos['mod41']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-table"></i><a href="main.php?pag=com_form_analisiscco"> Análisis Adic. CCO</a></li>':'' ?>
                        <?php echo ($permisos['mod43']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-table"></i><a href="main.php?pag=com_form_backlog"> Editor Backlog</a></li>':'' ?>
                    </ul>
                </li>
                <!-- Menú Comercial -->


                <!-- MENÚ MANAGER -->
                <?php
                $menuManager = '';
                if($permisos['mod44'] == 0 && $permisos['modAll']==0)
                {
                    $menuManager = $estilOculto;
                }
                ?>
                <h3 class="menu-title" <?php echo $menuManager; ?>><i class="menu-icon fa fa-gears"></i> Manager</h3>
                <li class="menu-item-has-children dropdown" <?php echo $menuManager; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Usuarios</a>
                    <ul class="sub-menu children dropdown-menu">
                        <?php echo ($permisos['mod44']==1 || $permisos['modAll']==1)?'<li><i class="fa fa-user"></i><a href="main.php?pag=adm_usuarios">Mantenedor Usuarios</a></li>':'' ?>
                    </ul>
                </li>


                <!--
                                <li class="menu-item-has-children dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-question"></i>Ayuda</a>
                                    <ul class="sub-menu children dropdown-menu">

                                            <li><i class="fa fa-question-circle"></i><a href="main.php?pag=534_ayuda_videos">Videos Ayuda</a></li>

                                            <li><i class="fa fa-question-circle"></i><a href="main.php?pag=534_ayuda_contacto">Contacto</a></li>

                                    </ul>
                                </li>-->


                <!-- <h3 class="menu-title">Manager</h3> -->




            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->
<?php

?>

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa far fa-bars"></i></a>

            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong></strong>&nbsp;&nbsp;<img class="user-avatar rounded-circle" src="https://sistemas.ika-hub.cl/extranet/html/images/admin.jpg" alt="User Avatar" align="top">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i>Mi Perfil</a> -->
                        <form method="post">
                            <button type="submit" id="btnSalir" name="btnSalir" class="btn btn-primary"><i class="fa fa-power-off""></i> Cerrar Sesión </button>

                        </form>
                    </div>
                </div>



            </div>
        </div>

    </header>
    <!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>
                        <div class="fa fa-user"></div> Dashboard Principal</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- AREA DE CONTENIDO -->
    <div class="content mt-3">
        <?php

        if(isset($_GET["pag"]))
        {
            if($_GET["pag"]=="dashboard" ||
                $_GET["pag"]=="ejemplo_graficos" ||
                $_GET["pag"]=="ejemplo_bi" ||
                $_GET["pag"]=="ejemplo_consolidado" ||
                $_GET["pag"]=="prevencion_1" ||
                $_GET["pag"]=="prevencion_2" ||
                $_GET["pag"]=="prevencion_3" ||
                $_GET["pag"]=="com_inf_real_budget" ||
                $_GET["pag"]=="com_inf_diversific" ||
                $_GET["pag"]=="com_inf_backlog" ||
                $_GET["pag"]=="com_form_ingresobudget" ||
                $_GET["pag"]=="com_form_analisiscco" ||
                $_GET["pag"]=="com_form_backlog"  ||
                $_GET["pag"]=="com_form_backlog_editar" ||
                $_GET["pag"]=="com_inf_diversific_budget" ||
                $_GET["pag"]=="com_inf_real_budget_un" ||
                $_GET["pag"]=="com_inf_backlog_tabla" ||
            $_GET["pag"]=="com_inf_real_budget_un_infra" ||
                $_GET["pag"]=="com_inf_backlog_infra" ||
            $_GET["pag"]=="com_inf_backlog_min" ||
                $_GET["pag"]=="com_inf_backlog_ind" ||
                $_GET["pag"]=="com_inf_real_budget_un_det" ||
                $_GET["pag"]=="com_inf_backlog_total" ||
            $_GET["pag"]=="com_inf_backlog_tabla_ind_min" ||
                $_GET["pag"]=="com_inf_real_budget_min_ind" ||
            $_GET["pag"]=="com_form_publica_fi" ||
                $_GET["pag"]=="powerbi_op_nvatocopilla" ||
                $_GET["pag"]=="powerbi_op_cosechasales" ||
                $_GET["pag"]=="powerbi_op_clc" ||
                $_GET["pag"]=="powerbi_maq_disponibilidad" ||
                $_GET["pag"]=="powerbi_maq_arriendo" ||
                $_GET["pag"]=="fi_inf_unindustrial" ||
                $_GET["pag"]=="rrhh_inf_hrsextra" ||
                $_GET["pag"]=="rrhh_form_hrsextra" ||
            $_GET["pag"]=="rrhh_inf_cargosmensual" ||
            $_GET["pag"]=="rrhh_form_talana" ||
                $_GET["pag"]=="fi_cons_ind_min" ||
            $_GET["pag"]=="fi_inf_unmineria" ||
            $_GET["pag"]=="fi_inf_uninfraestructura" ||
                $_GET["pag"]=="fi_inf_obras" ||
                $_GET["pag"]=="fi_inf_admyventas" ||
                $_GET["pag"]=="fi_inf_mantencion" ||
            $_GET["pag"]=="fi_inf_maquinaria" ||
                $_GET["pag"]=="fi_inf_maquinaria_usd" ||
            $_GET["pag"]=="fi_inf_consolidado_ind_min_maq" ||
            $_GET["pag"]=="fi_inf_consolidado_ind_min" ||
                $_GET["pag"]=="fi_inf_consolidado_ind" ||
            $_GET["pag"]=="fi_inf_consolidado_min" ||
            $_GET["pag"]=="fi_inf_consolidado_infra" ||
                $_GET["pag"]=="fi_inf_gactivos" ||
            $_GET["pag"]=="fi_inf_consolidado" ||
                $_GET["pag"]=="adm_usuarios" ||
                $_GET["pag"]=="adm_permisos_usuario" ||
                $_GET["pag"]=="op_dir_nvavictoria" ||
                $_GET["pag"]=="com_inf_cump_budg_tabla"
































            )

            {
                include $_GET["pag"].".php";
            }else
            {
                include "404_ika.php";
            }

        }
        else
        {


        }
        ?>

    </div>
    <!-- FIN AREA DE CONTENIDO -->

</div>
<!-- .content -->


<!-- <div class="zoom">
    <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>
    <ul class="zoom-menu">
        <li><a href="https://sistemas.ika-hub.cl/flotas4/" class="zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out"><i class="fa fa-truck"></i></a></li>
        <li><a href="https://sistemas.ika-hub.cl/extranet/" class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out"><i class="fa fa-etsy"></i></a></li>
        <li><a href="https://sistemas.ika-hub.cl/dashboards/" class="zoom-fab zoom-btn-sm zoom-btn-tangram scale-transition scale-out"><i class="fa fa-bar-chart"></i></a></li>
        <li><a href="https://legacy.ika-hub.cl/app/" class="zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out"><i class="fa fa-info"></i></a></li>
    </ul>
 Sub Menus de Iconos
    <div class="zoom-card scale-transition scale-out">
        <ul class="zoom-card-content">
            <li>Content 1</li>
            <li>Content 2</li>
            <li>Content 3</li>
            <li>Content 4</li>
            <li>Content 5</li>
        </ul>
    </div>
</div> -->

</div>




<script src="html/vendors/jquery/dist/jquery.min.js"></script>

<script src="html/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="html/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="html/assets/js/main.js"></script>

<script src="html/assets/js/dashboard.js"></script>
<script src="html/assets/js/widgets.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

<script src="repositorio/js/chartjs-init.js"></script>
<script src="repositorio/js/index.js"></script>

</body>


</html>