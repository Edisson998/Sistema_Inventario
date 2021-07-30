<?php include_once '../plantilla/header.php'; ?>

<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURLSI ?>sweetalert/sweetalert2.min.css" rel="stylesheet">

    <title>Médicos</title>

    <style>
        table th {
            background: #2A3F54;
            color: white;
        }


        .titulo {

            font-family: Berlin Sans FB Demi;
            padding: 5px;
            color: #00aae4;
            border-radius: 5px;
            text-align: left;
            font-size: 2.5em;
            margin-bottom: 5px;

        }

        .alert {
            width: 20%;
            float: right;
            margin-left: 10px;
        }
    </style>

</head>

<body>
    <div class="page-title">
        <div class="title_left">
            <h3 class="titulo" style="padding-left: 10px;">Productos</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <?php include 'abastecer.php'; ?>
                <?php include 'vender.php'; ?>
                <?php include 'estadistica.php'; ?>
                <?php
                //instanciamos la conexion
                $obj = new Conexion();
                $pdo = $obj->Conectar();
                $sql = "SELECT PRO_CODIGO, PRO_STOCK_MAX from tbl_producto WHERE PRO_STOCK_MAX <= 5";
                $quer = $pdo->prepare($sql);
                $quer->execute();
                $results = $quer->fetchAll();
                foreach ($results as $row) { ?>
&nbsp;&nbsp;
                    <div class="alert alert-info alert-dismissible fade show left" id="success-alert" role="alert">
                        Se debe abastecer el producto con el código <strong> <?php echo $row['PRO_CODIGO']; ?></strong> quedan <?php echo $row['PRO_STOCK_MAX']; ?> unidades 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    &nbsp;&nbsp;
                <?php   } ?>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box ">
                            <table id="tablaProductos" class="table table-striped table-bordered dt-responsive nowrap contenido" style="width:100% ;">

                                <thead>
                                    <tr>

                                        <th scope="col">Categoría</th>
                                        <th scope="col">Código </th>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Descripción </th>
                                        <th scope="col">Precio Compra </th>
                                        <th scope="col">Iva</th>
                                        <th scope="col">Precio Venta</th>
                                        <th scope="col" data-priority>Cantidad </th>
                                        <th scope="col">Estado</th>
                                        <th scope="col" data-priority>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo SERVERURLSI ?>sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo SERVERURLSI ?>jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURLSI ?>Controller/Js/productos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>

</html>

<?php include_once '../plantilla/footer.php' ?>