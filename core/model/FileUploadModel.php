<?php
class FileUploadModel 
{
	public static function fileUploader($file){
			$nombre_img = $_FILES['subir_archivo']['name'];
			$nombre_img = $_FILES['subir_archivo']['name'];
			//indicamos los formatos que permitimos subir a nuestro servidor
         	 $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/wps-office.xlsx'];       
			if (in_array($_FILES["subir_archivo"]["type"],$allowedFileType)){
				$directorio = 'asset/upload/temp/';
                $dir = move_uploaded_file($_FILES['subir_archivo']['tmp_name'],$directorio.$nombre_img);
                $ruta = $directorio.$_FILES['subir_archivo']['name'] ;
				$data = [$dir,$ruta];
				
			}else{
				$data  = ['msj'=>'El formato del archivo es incorrecto','status'=>'ok','code'=>'300'];
            }
        return $data;
	}	

	public static function fileUpExplosion(){
		$nombre_file = $_FILES['subir_archivo']['name'];
		//indicamos los formatos que permitimos subir a nuestro servidor
	  	$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/wps-office.xlsx'];       
		if (in_array($_FILES["subir_archivo"]["type"],$allowedFileType)){	
			$dir = array();
			$ruta = array();
			$directorio = 'asset/upload/temp/';
			array_push($dir,move_uploaded_file($_FILES['subir_archivo']['tmp_name'],$directorio.$nombre_file));
			array_push($ruta,$directorio.$_FILES['subir_archivo']['name']);
			$data = [$dir,$ruta];
		}else{
			$data  = ['msj'=>'El formato del archivo es incorrecto','status'=>'ok','code'=>'300'];
		}
		return $data;
	}	
    
}
