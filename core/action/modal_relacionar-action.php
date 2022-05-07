



<div class="container">
    <h5 class="text-center">1. Descargue la siguiente plantilla en excel y llenela con los datos que desea subir</h5>
    <br>
    <p><b>Nota : </b> Para relacionar un subproducto con su respectivo grupo , por favor suba 
    la plantilla de excel especificando primeramente el grupo y luego el codigo del subproducto que desea relacionar. El subproducto debe estar registrado en su catalogo</p>
    <div class="text-center">
        <a class="text-center" href="asset/upload/plantilla_relacionar.xlsx" download="PlantillaSubisubproducto">
            <i class="fas fa-file-excel"></i> <b>Descargar plantilla</b>
        </a>
    </div>
    <br>
    <hr><br>
    <form name="frm_subir_linea" id="frm_subir_relacionar" action="./?view=add_subir_relacionar" method="POST" role="form" enctype="multipart/form-data">
        <h5 class="text-center">2. importar archivo</h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Subir</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="subir_archivo" id="subir_archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                <label class="custom-file-label" for="inputGroupFile01">Escoger archivo</label>
            </div>
        </div>
        <br><br>
        <div class="text-center">
            <div class="col-md-12">
                <input type="submit" id="btn_subir_subproducto" class=" btn_subir_subproducto btn bg-nav text-light btn-fill btn-wd" value=" Subir archivo"/>
            </div>
        </div>
    </form>
</div>