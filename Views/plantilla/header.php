<?php

include_once '../../Model/conexion.php';
include_once '../GlobalFuntion.php';




?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Menú</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
      <!-- Bootstrap -->
      <link href="<?php echo SERVERURLSI ?>Views/Complementos_Plantilla/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?php echo SERVERURLSI ?>Views/Complementos_Plantilla/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="<?php echo SERVERURLSI ?>Views/Complementos_Plantilla/build/css/custom.min.css" rel="stylesheet">

    

      <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

      



    </head>  

      <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-cubes"></i> <span>Bodega XYZ</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <!-- <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>John Doe</h2>
                  </div>
                </div>
                 /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">

                    <h3>Inicio</h3>
                    <ul class="nav side-menu">
                      <li><a href="<?php echo SERVERURLSI ?>Views/Estadisticas/estadisticas.php"><i class="fa fa-home"></i> Inicio</a></li>
                    </ul>
                    <ul class="nav side-menu">
                      <li><a href="<?php echo SERVERURLSI ?>Views/Principal/inicio.php"><i class="fa fa-home"></i> Inventario</a></li>
                    </ul>

                  </div>
                  <!-- <div class="menu_section">
                    <h3>Mantenimientos</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-cogs"></i>Ajustes<span class="fa fa-chevron-down"></span></a>

                        <ul class="nav child_menu">
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Usuarios/listar.php">Usuarios</a></li>
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Medicos/listar.php">Médicos</a></li>
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Especialidades/listar.php">Especialidades</a></li>
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Horarios/listar.php">Horarios</a></li>
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Pacientes/listar.php">Pacientes</a></li>
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Citas/calendario.php">Citas</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-file-archive-o"></i> Reportes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo SERVERURLSI ?>Vistas/Reportes/reporteCita.php">Citas</a></li>

                        </ul>
                      </li>
                    </ul>
                  </div> -->

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons  -->
                <div class="sidebar-footer hidden-small">

                  <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="<?php echo SERVERURLSI ?>Controlador/Login/cerrar.php">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                </div>
                <!-- /menu footer buttons -->
              </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    



                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col " id="contenido" role="main">
              <div class="">
                 
              