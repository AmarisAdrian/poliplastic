 <?php
 header("Content-type: application/json; charset=utf-8");
 if(isset($_POST["ruta"])){
     $ruta = $_POST["ruta"];  
     $explosion = ExplosionModel::truncate();
     $maquila = MaquilaModel::truncate();
     $produccion = ProduccionDiariaModel::truncate();
     $produccion_sap = ProduccionSapModel::truncate();
     $produccion_siin = ProduccionSiinModel::truncate();
     $relacion= RelacionDocumentoMaquilaModel::truncate();
     if ($explosion && $maquila && $produccion && $produccion_sap && $produccion_siin && $relacion){
         if(unlink($ruta)){
            $files = glob('./asset/upload/temp/*');
            foreach($files as $file){
               if(is_file($file))
                  if( unlink($file)){
                     echo json_encode(array('msj'=>'success','description'=> 'Se ha vaciado la caché de archivos'));
                  } 
            }
         } else {
            echo json_encode(array('msj'=>'success','description'=> 'No se pudo vaciar la caché de archivos '));
         }
     } else {
        echo json_encode(array('msj'=>'success','description'=> 'No se pudo vaciar los datos '));
     }

 } 
 ?>