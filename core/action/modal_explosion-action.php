<?php
$ruta = SubirMasivoModel::FileUploadExplosion($_GET['ruta']);
// $sync = SubirMasivoModel::FileUploadExplosion($_GET['rutasync']);
if(!empty($ruta) && !is_null($ruta) ){
?>
<br >
<div class="container">
  <h5>Se ha seleccionado el siguiente archivo en la ruta: <a href="<?php echo $_GET['ruta'];?>"> Verificar aqui</a></h5>
</div>              
<form id="frmGenerarExplosion" id="frmGenerarExplosion" name="frmGenerarExplosion" action="./?action=add_calcular" method="POST">
     <input id="subir_archivo" name="subir_archivo" type="hidden" value="<?php echo $_GET['ruta']?>">
     <div class="modal-footer">
                <button type="submit" name="btnGenerarExplosion" id="btnGenerarExplosion" class="btn bg-nav text-light btn-fill btn-wd">Generar excel </a>
                </div>
</form>
<?php } ?>