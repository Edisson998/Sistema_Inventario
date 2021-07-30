<div class="modal fade" id="AbastecerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-cube" aria-hidden="true"></i> Abastecer Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate enctype="multipart/form-data" id="formAbastecer" method="POST">
          <div class="form-row">

            <input type="hidden" class="form-control" id="idPro" name="idPro">
            
            <div class="form-group col-md-12">
              <strong><label for="txtCantidad">Cantidad</label></strong>
              <input type="text" class="form-control  input" id="txtCantidad" name="txtCantidad">
            </div>

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" name="btnAbastecer" id="btnAbastecer"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>