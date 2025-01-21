<div class="modal fade mdlup" id="modalSelectTalla<?php echo $fila['idProducto']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-card border-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h4>¡Favor de Seleccionar una Talla!</h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="productos/info_producto.php?idProducto=<?php echo $fila['idProducto']?>" type="button" class="button-link">Entendido</a>
            </div>
        </div>
    </div>
</div>

<style>
  .mdlup{
    z-index: 10000;
  }
</style>