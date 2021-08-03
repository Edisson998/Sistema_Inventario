<?php
require_once '../../Model/conexion.php';
error_reporting(0);

?>
<div class="modal fade" id="EditarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-md" aria-hidden="true"></i> Editar Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarP" method="POST">
                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <label for="ctp">Categoría</label>
                            <input type="hidden" class="form-control" id="idp" name="idp">
                            <select class="form-control " name="ctp" id="ctp">

                                <option selected="" id="ctpE" value="">Seleccione una opcion</option>
                                <?php
                                $ob = new Conexion();
                                $con = $ob->Conectar();
                                $q = "SELECT CATP_ID, CATP_NOMBRE FROM tbl_categoria";
                                $que = $con->prepare($q);
                                $que->execute();
                                $result = $que->fetchAll();
                                foreach ($result  as $val) {
                                ?>
                                    <option value="<?php echo $val['CATP_ID'] ?>"><?php echo $val['CATP_NOMBRE']  ?> </option>
                                <?php }  ?>
                            </select>



                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="cp">Código</label>
                            <input type="text" class="form-control" id="cp" name="cp">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="np">Nombre del Producto</label>
                            <input type="text" class="form-control input " id="np" name="np">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pcp">Precio de compra</label>
                            <input type="text" class="form-control input " id="pcp" name="pcp">
                        </div>

                        
                    </div>


                    <div class="form-row">

                    <div class="form-group col-md-6">
                            <label for="iva">Iva</label>
                            <input type="text" class="form-control input " id="iva" name="iva">
                        </div>

                        <div class="form-group col-md-6">

                            <label for="pvp">Precio de venta</label>
                            <input type="text" class="form-control input " id="pvp" name="pvp">                            

                        </div>

                        

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ctdp">Cantidad</label>
                            <input type="text" min="1" class="form-control input"  id="ctdp" name="ctdp">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ctdpmi">Cantidad Mínima</label>
                            <input type="number" min="1" class="form-control input " id="ctdpmi" name="ctdpmi">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="desp">Descripción</label>
                            <input type="text" class="form-control input" id="desp" name="desp">
                        </div>
                        
                    </div>

                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                <button type="button" class="btn btn-primary" name="btnEditarMedico" id="btnEditarMedico"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</button>
            </div>
            </form>
        </div>
    </div>
</div>