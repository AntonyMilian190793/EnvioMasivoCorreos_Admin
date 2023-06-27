<div id="mntmantenimiento" class="modal fade basicModalLG" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" id="producto_form" action="">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="prod_id" id="prod_id">
                    <div class="form-group">
                        <label>Financidador</label>
                        <input type="text" id="prod_nom" name="prod_nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Oficial</label>
                        <input type="text" id="prod_oficial" name="prod_oficial" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>S/.</label>
                        <input type="text" id="prod_soles" name="prod_soles" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>USD</label>
                        <input type="text" id="prod_usd" name="prod_usd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Plazo</label>
                        <input type="text" id="prod_plazo" name="prod_plazo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Inicio</label>
                        <input type="date" id="fech_inicio" name="fech_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Fin</label>
                        <input type="date" id="fech_fin" name="fech_fin" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Monto USD</label>
                        <input type="text" id="prod_monto" name="prod_monto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>II.EE</label>
                        <input type="text" id="prod_ie" name="prod_ie" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>