<div id="mntmantenimiento" class="modal fade basicModalLG" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" id="usuario_form" action="">
            <div class="modal-header">
                <h5 id="lbltitulo" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <input type="hidden" name="usu_id" id="usu_id">
                <div class="form-group">
                    <label>Nombres</label>
                        <input type="text" id="usu_nom" name="usu_nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                        <input type="text" id="usu_apep" name="usu_apep" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                        <input type="email" id="usu_correo" name="usu_correo" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>