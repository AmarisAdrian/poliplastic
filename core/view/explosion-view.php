<div class="container">
    <h5><i class="fa fa-upload"></i> Subir archivos para calcular explosion </h5>
    <hr><br>
    <form name="frm_subir_explosion" id="frm_subir_explosion" action="./?action=add_explosion" method="POST" role="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <h5 class="text-left">1. importar archivo </h5>
                <div class="form-group">
                    <div class="input-group mb-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Subir</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="subir_archivo custom-file-input form-control" name="subir_archivo" id="subir_archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" aria-describedby="txt_subir_archivo_siigo" required>
                            <label class="custom-file-label" for="inputGroupFile01">Escoger archivo</label>
                        </div>
                    </div>
                    <small id="txt_subir_archivo_siigo" class="form-text text-danger">El archivo no ha sido cargado</small>
                </div>
            </div>
        </div>
        <br><br>
        <div class="text-center">
            <div class="col-md-12">
                <button type="submit" id="btn_subir_explosion" name="btn_subir_explosion" class=" btn bg-nav text-light btn-fill btn-wd">Subir archivo</button>
                </div>
            </div>
        </div>
    </form>
  
    <!--VENTANA MODAL VISUALIZAR CARGA-->
    <div id="modal_visualizar_datos" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-nav">
                    <h5 class="modal-title text-light"><i class="fas fa-check-double"></i> </a>Confirmacion de datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>