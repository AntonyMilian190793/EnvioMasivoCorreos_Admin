<div id="mntmantenimiento" class="modal fade basicModalLG" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mantenimiento</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre de Producto</label>
                        <input type="text" id="prod_nom" name="prod_nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Precio Normal</label>
                        <input type="text" id="prod_precion" name="prod_precion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Precio Desc.</label>
                        <input type="text" id="prod_preciod" name="prod_preciod" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Url</label>
                        <input type="text" id="prod_url" name="prod_url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Ruta Imagen</label>
                        <input type="text" id="prod_img" name="prod_img" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Cupón</label>
                        <input type="text" id="prod_cupon" name="prod_cupon" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                        <textarea id="prod_descrip" id="prod_descrip" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>