<?php 
if(isset($_POST)){ 
    $file = FileUploadModel::fileUploader($_FILES['subir_archivo']);
    $ruta = $file[1];
    $val = $file[0];
    if($val){   
       $linea = SubirMasivoModel::FileUploadLineaInventario($ruta);
        if($linea){
            if(unlink($ruta)){
                Core::alert("Correcto","Archivo cargado correctamente","./?view=linea_inventario");
            }
            else{
               Core::alert("Error","Error al vaciar los archivos temporales. Contacte al administrador","./?view=linea_inventario");
            } 
        }else{
            Core::alert("Error","El archivo no pudo ser cargado. Verifique que los datos estén correctos","./?view=linea_inventario");
        } 
     }
}
