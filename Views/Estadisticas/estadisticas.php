<?php
include_once "../plantilla/header.php";


include_once '../../Model/conexion.php';
date_default_timezone_set('UTC');
$ob = new Conexion();
$co = $ob->Conectar();

?>



<div  role="main">
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-line-chart"></i></div>
                  <div class="count"><?php
						$sql = "select COUNT(*) from tbl_pedido_cabecera";
$result = $co->query($sql);//$pdo sería el objeto conexión
$ventas  = $result->fetchColumn(); echo $ventas
?></div>
                  <h3>Ventas</h3>
                  <h3>Total</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-dollar"></i></div>
                  <div class="count"><?php
						$sql = "select sum(PED_TOTAL) from tbl_pedido_cabecera";
$result = $co->query($sql);//$pdo sería el objeto conexión
$total_ventas  = $result->fetchColumn(); if($total_ventas > 0){
    echo $total_ventas;
} else {

    echo 0;
}
?></div>
                  <h3>Total Vendido</h3>

                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count"><?php
                        $Object = new DateTime();
                        $fecha_actual = $Object->format("Y-m-d");
                        $desde = $fecha_actual.' 06:00:00';
                        $hasta = $fecha_actual.' 21:59:59';
						$sql = "select sum(PED_TOTAL) from tbl_pedido_cabecera where  PED_FECHA between '$desde' and '$hasta' ";
$result = $co->query($sql);//$pdo sería el objeto conexión
$ventas_hoy  = $result->fetchColumn();  if($ventas_hoy > 0){
    echo $ventas_hoy;
} else {

    echo 0;
}
?></div>
                  <h3>Ventas</h3>
                  <h3>de Hoy</h3>

                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count"><?php
						$sql = "select COUNT(*) from tbl_cliente where CLI_ESTADO = 'A'";
$result = $co->query($sql);//$pdo sería el objeto conexión
$ventas  = $result->fetchColumn(); echo $ventas
?></div>
                  <h3>Clientes</h3>
                  <h3>registrados</h3>
                </div>
              </div>
            </div>
          </div>
          <?php include_once 'barra.php'; ?>

<canvas id="chart1" height="100"></canvas>
</div>
          </div>
		  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [
        
        "Enero",
        "Febreo",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre", 

        ],
        datasets: [{
            label: ' Ventas',
            data: [
        
        <?php echo $enero;?>,
        <?php echo $febrero;?>,
        <?php echo $marzo;?>,
        <?php echo $abril;?>,
        <?php echo $mayo;?>,
        <?php echo $junio;?>,
        <?php echo $julio;?>,
        <?php echo $agosto;?>,
        <?php echo $semptiembre;?>,
        <?php echo $octubre;?>,
        <?php echo $noviembre;?>,
        <?php echo $diciembre;?>, 
        
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
        
        
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>

          <?php
include_once "../plantilla/footer.php";

?>