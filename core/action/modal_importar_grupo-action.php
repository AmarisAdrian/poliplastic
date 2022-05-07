<div class="container">
    <h5 class="text-center">1. Descargue la siguiente plantilla en excel y llenela con los datos que desea subir</h5>
    <div class="text-center">
        <a class="text-center" href="asset/upload/plantilla_grupo.xlsx" download="PlantillaSubirGrupo">
            <i class="fas fa-file-excel"></i> <b>Descargar plantilla</b>
        </a>
    </div>
    <br>
    <hr><br>
    <form name="frm_subir_grupo" id="frm_subir_grupo" action="./?view=add_subir_grupo" method="POST" role="form" enctype="multipart/form-data">
        <h5 class="text-center">2. importar archivo</h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Subir</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="subir_archivo" name="subir_archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                <label class="custom-file-label" for="inputGroupFile01">Escoger archivo</label>
            </div>
        </div>
        <br><br>
        <div class="text-center">
            <div class="col-md-12">
                <button type="submit" class="btn bg-nav text-light btn-fill btn-wd">Subir archivo</button>
            </div>
        </div>
    </form>
</div>