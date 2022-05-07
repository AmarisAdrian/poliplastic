<div class="container">
    <h5 class="text-center">1. Descargue la siguiente plantilla en excel y llenela con los datos que desea subir</h5>
    <div class="text-center">
        <a class="text-center" href="asset/upload/plantilla_catalogo.xlsx" download="PlantillaSubirCatalogo">
            <i class="fas fa-file-excel"></i> <b>Descargar plantilla</b>
        </a>
    </div>
    <br>
    <hr><br>
    <form name="frm_subir_catalogo" id="frm_subir_catalogo" action="./?view=add_subir_catalogo" method="POST" role="form" enctype="multipart/form-data">
        <h5 class="text-center">2. importar archivo</h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Subir</span>
            </div>
            <div class="custom-file">
                <input type="file" class="subir_archivo custom-file-input" name="subir_archivo" id="subir_archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                <label class="custom-file-label" for="inputGroupFile01">Escoger archivo</label>
            </div>
        </div>
        <br><br>
        <div class="text-center">
            <div class="col-md-12">
                <button type="submit" id="btn_subir_catalogo" name="btn_subir_catalogo" class=" btn bg-nav text-light btn-fill btn-wd">Subir archivo</button>
            </div>
        </div>
    </form>
</div>