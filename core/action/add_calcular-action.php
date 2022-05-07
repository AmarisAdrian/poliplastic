<?php

include_once "core/model/InterfazSiigoModel.php";
include_once "core/model/SubirMasivoModel.php";
include_once "core/model/GenerarArchivoModel.php";
header("Content-type: application/json; charset=utf-8");
if (isset($_POST)) {
    $excel = new InterfazSiigoModel();
    $explosion = SubirMasivoModel::FileAddExplosion($_POST['subir_archivo']);
    if ($explosion) {
        $produccion = SubirMasivoModel::FileAddProduccion($_POST['subir_archivo']);
        if($produccion){   
             $produccion_sap = SubirMasivoModel::FileAddProduccionSap(($_POST['subir_archivo']));
             if($produccion_sap){
                $produccion_siin= SubirMasivoModel::FileAddProduccionSiin(($_POST['subir_archivo']));
                 if($produccion_siin){
                    $relacionar = RelacionDocumentoMaquilaModel::Relacionar();
                    if($relacionar){
                            if($excel->GenerarExcel()) {
                                $generar = GenerarArchivoModel::Generar();
                                $ruta = $generar[1];
                                if ($generar[0]) {                        
                                    echo json_encode(array('msj'=>'success','ruta'=>$ruta,'status'=>'200')); 
                                } else {                         
                                echo json_encode(array('msj'=>'error','descripcion'=>'Archivo de excel no generado','status'=>'202')); 
                                }    
                        } else {
                            echo json_encode(array('msj'=>'error','descripcion'=>'Archivo maquila no generado','status'=>'202'));   
                        }
                    }else{
                        echo json_encode(array('msj'=>'error','descripcion'=>'Archivo documento maquila no relacionado','status'=>'202'));   
                    }
               }else{
                 echo json_encode(array('msj'=>'error','descripcion'=>'Archivo siin no procesado','status'=>'202'));  
               }
            } else{
                echo json_encode(array('msj'=>'error','descripcion'=>'Archivo sap no procesado','status'=>'202'));  
             }     
        } else{
            echo json_encode(array('msj'=>'error','descripcion'=>'Archivo produccion diaria no procesado','status'=>'202'));  
        }  
    } else {
        echo json_encode(array('msj'=>'error','descripcion'=>'Archivo bdexplosion no procesado','status'=>'202'));
    }
}else{
    echo json_encode(array('msj'=>'error','descripcion'=>'Error de validacion','status'=>'500'));
}
