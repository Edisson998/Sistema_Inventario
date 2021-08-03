<?php
require_once '../Model/conexion.php';

//instanciamos la conexion
$ob = new Conexion();
$con = $ob->Conectar();

//Reliazmos la consulta de los datos que queremos obtener
$sql = "SELECT p.PRO_ID, c.CATP_ID,	c.CATP_NOMBRE, p.PRO_CODIGO, p.PRO_NOMBRE, p.PRO_DESCRIPCION,p.PRO_PRECIOCOMPRA, p.PRO_PRECIO_VENTA,p.PRO_IVA,
p.PRO_ESTADO, p.PRO_STOCK_MAX, p.PRO_STOCK_MIN FROM	tbl_producto p INNER JOIN tbl_categoria c ON p.CATP_ID = c.CATP_ID WHERE p.PRO_ESTADO = 'A'";
$que = $con->prepare($sql);
$que->execute();
$result = $que->fetchAll();

$producto = array();

foreach ($result as $row) {
    $idProd = $row['PRO_ID'];
    $idCat= $row['CATP_ID'];
    $catNom= $row['CATP_NOMBRE'];
    $codProd = $row['PRO_CODIGO'];
    $nomPro = $row['PRO_NOMBRE'];
    $desPro = $row['PRO_DESCRIPCION'];    
    $pcPro = $row['PRO_PRECIOCOMPRA'];
    $pvPro = $row['PRO_PRECIO_VENTA'];
    $ivPro= $row['PRO_IVA'];
    $smaPro = $row['PRO_STOCK_MAX']; 
    $cant = $row['PRO_STOCK_MAX'];   
    if($smaPro <= 5){
        $smaPro = $row['PRO_STOCK_MAX'] =   "<span class='badge badge-danger'> $smaPro </span>";
    }else {
        $smaPro = $row['PRO_STOCK_MAX'] =  "<span class='badge badge-success'>  $smaPro  </span>" ;
    }
    $smiPro = $row['PRO_STOCK_MIN'];
    $estPro = $row['PRO_ESTADO'];
    if ($estPro = $row['PRO_ESTADO'] == 'A') {

        $estPro = $row['PRO_ESTADO'] = "<span class='badge badge-success'> <i class='fa fa-check'> Activo</span> ";
    }else{
        $estPro = $row['PRO_ESTADO'] = "<span class='badge badge-danger'> <i class='fa fa-check'> Inactivo </span>";
    }  
   
    $producto[] = array(
        'PRO_ID' => $idProd,
        'CATP_ID' => $idCat,
        'CATP_NOMBRE' => $catNom,
        'PRO_CODIGO' => $codProd,
        'PRO_NOMBRE' => $nomPro,
        'PRO_DESCRIPCION' => $desPro,
        'PRO_PRECIOCOMPRA' => $pcPro,
        'PRO_PRECIO_VENTA' => $pvPro,
        'PRO_IVA' => $ivPro,
        'PRO_STOCK_MAX' => $smaPro,
        
        'PRO_STOCK_MIN' => $smiPro,
        'PRO_ESTADO' => $estPro
    );
}
$data["data"] = $producto;
$resultadoJson = json_encode($data);
echo $resultadoJson;
$con = null;
