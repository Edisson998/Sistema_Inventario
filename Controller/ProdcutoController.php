<?php  
require_once '../Model/conexion.php';
header("Content-Type: application/json"); // muestra el json còmo objeto
//instanciamos la conexion
$ob = new Conexion();
$con = $ob->Conectar();

if ($_POST) {

    
    //verificamos que la accion exista
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == "actualizar") {

            $idPro = $_POST['idPro'];
            $cant = $_POST['txtCantidad'];
           

            $sqlu = "UPDATE tbl_producto SET PRO_STOCK_MAX=PRO_STOCK_MAX+$cant WHERE PRO_ID = '$idPro' ";
            $queryu = $con->prepare($sqlu);           
            $queryu->bindParam(':cant', $cant, PDO::PARAM_INT);           
            $rsu = $queryu->execute();

            if ($rsu) {
                $response["success"] = true;
                $response["mensaje"] = "Se abastecio correctamente";
            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se abastecio correctamente";
                $response["consulta"] = $queryu;
                $response["execute"] = $rsu;
            }
            echo json_encode($response);
            exit;
        }else if($_POST['accion'] == "vender"){
            $idProV = $_POST['idProV'];
            $cantV = $_POST['txtCantidadV'];  
            $precio = $_POST['precio'];
                      
           $fecha = date('Y-m-d H:M:S');
            $total = $cantV *  $precio;

            $sqlu = "INSERT INTO tbl_pedido_detalle (PRO_ID,DEP_FECHA, DEP_CANTIDAD, DEP_PRECIO_UNITARIO,  DEP_PRECIO_TOTAL) VALUES (:idProV, :fecha, :cantV, :precio , :total)";
            $queryu = $con->prepare($sqlu);
            $queryu->bindParam(':idProV', $idProV, PDO::PARAM_INT);    
            $queryu->bindParam(':fecha', $fecha, PDO::PARAM_STMT); 
            $queryu->bindParam(':cantV', $cantV, PDO::PARAM_INT);
            $queryu->bindParam(':precio', $precio, PDO::PARAM_STMT);           
            $queryu->bindParam(':total', $total, PDO::PARAM_STMT);   
             
            $rsv = $queryu->execute();

            if ($rsv) {
                $response["success"] = true;
                $response["mensaje"] = "Se vendio correctamente";
                $sqlud = "UPDATE tbl_producto SET PRO_STOCK_MAX=PRO_STOCK_MAX-$cantV WHERE PRO_ID = '$idProV' ";
                $queryud = $con->prepare($sqlud);           
                $queryud->bindParam(':cant', $cant, PDO::PARAM_INT);           
                $queryud->execute();

            } else {
                $response["success"] = false;
                $response["mensaje"] = "No se vendio correctamente";
                $response["consulta"] = $queryu;
                $response["execute"] = $rsv;
            }
            echo json_encode($response);
            exit;
        } else {
            //mostramos en formato json cuando no exista ninguna accion
            $response["success"] = false;
            $response['mensaje'] = "no existe la accion insertar, actualizar o eliminar"; //es opcional esto

            echo json_encode($response);
            exit;
        }
        
    }
}



?>