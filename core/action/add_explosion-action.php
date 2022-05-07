<?php
header("Content-type: application/json; charset=utf-8");
if (isset($_FILES)) {
    $file = FileUploadModel::fileUpExplosion($_FILES['subir_archivo']);
   if ($file[0][0] == false) {
        echo json_encode(array('msj'=>$file['msj'],'status'=>'ok','code'=>'300','ruta'=>$file[1][0]));
    }
   if ($file[0][0]) {
        $explosion = SubirMasivoModel::FileUploadExplosion($file[1][0]);  
        if($explosion){  
            $produccion = SubirMasivoModel::FileUploadProduccionDiaria($file[1][0]);
            if($produccion){
                $produccion_sap = SubirMasivoModel::FileUploadProduccionSap($file[1][0]);
                if($produccion_sap){
                    $produccion_siin =SubirMasivoModel::FileUploadProduccionSiin($file[1][0]);
                    if($produccion_siin){
                        echo json_encode(array('response'=>$upload[1] ,'status'=>'ok','code'=>'200','msj'=>'success','ruta'=>$file[1][0]));
                    }else{
                        echo json_encode(array('status'=>'ok','code'=>'200','msj'=>'Error procesando hoja produccion siin '));
                    }
                }else{
                    echo json_encode(array('status'=>'ok','code'=>'200','msj'=>'Error procesando hoja produccion Sap '));
                }             
            }else{
                echo json_encode(array('status'=>'ok','code'=>'200','msj'=>'Error procesando hoja produccion diaria '));
            }            
        } else{
            echo json_encode(array('status'=>'ok','code'=>'200','msj'=>'Error procesando hoja produccion diaria '));
        } 
    }
}else{
    echo json_encode(array('status'=>'ok','code'=>'200','msj'=>'Error al validar el archivo'));
}
