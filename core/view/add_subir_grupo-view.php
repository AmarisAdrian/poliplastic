<?php 
if(isset($_POST)){ 
    $file = FileUploadModel::fileUploader($_FILES['subir_archivo']);
    $ruta = $file[1];
    $val = $file[0];
    if($val){   
       $grupo = SubirMasivoModel::FileUploadGrupo($ruta);
        if($grupo){
            if(unlink($ruta)){
                Core::alert("Correcto","Archivo cargado correctamente","./?view=grupo");
            }
            else{
                Core::alert("Error","Error al vaciar los archivos temporales. Contacte al administrador","./?view=grupo");
            } 
        }else{
             Core::alert("Error","El archivo no pudo ser cargado. Verifique que los datos estén correctos","./?view=grupo");
        } 
     }
}
