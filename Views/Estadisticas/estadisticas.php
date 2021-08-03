<?php
include_once "../plantilla/header.php";


include_once '../../Model/conexion.php';
date_default_timezone_set('UTC');
$ob = new Conexion();
$co = $ob->Conectar();

?>



<div role="main">
  <div class="">
    <div class="form-row" >
      <div class="container">
        <div class="animated flipInY form-group col-md-3 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-line-chart"></i></div>
            <div class="count"><?php
                                $sql = "select COUNT(*) from tbl_pedido_detalle";
                                $result = $co->query($sql); //$pdo sería el objeto conexión
                                $ventas  = $result->fetchColumn();
                                echo $ventas
                                ?></div>
            <h3>Ventas</h3>
            <h3>Total</h3>
          </div>
        </div>
        <div class="animated flipInY form-group col-md-3 ">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-dollar"></i></div>
            <div class="count"><?php
                                $sql = "select sum(DEP_PRECIO_TOTAL) from tbl_pedido_detalle";
                                $result = $co->query($sql); //$pdo sería el objeto conexión
                                $total_ventas  = $result->fetchColumn();
                                if ($total_ventas > 0) {
                                  echo $total_ventas;
                                } else {

                                  echo 0;
                                }
                                ?></div>
            <h3>Total</h3>
            <h3>Vendido</h3>

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

        <?php echo $enero; ?>,
        <?php echo $febrero; ?>,
        <?php echo $marzo; ?>,
        <?php echo $abril; ?>,
        <?php echo $mayo; ?>,
        <?php echo $junio; ?>,
        <?php echo $julio; ?>,
        <?php echo $agosto; ?>,
        <?php echo $semptiembre; ?>,
        <?php echo $octubre; ?>,
        <?php echo $noviembre; ?>,
        <?php echo $diciembre; ?>,

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
          beginAtZero: true
        }
      }]
    }
  };
  var chart1 = new Chart(ctx, {
    type: 'bar',
    /* valores: line, bar*/
    data: data,
    options: options
  });
</script>

<?php
include_once "../plantilla/footer.php";

?>