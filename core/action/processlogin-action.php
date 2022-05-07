<?php 

 if((!empty($_POST["usuario"]))&&(!empty($_POST["password"]))){
   if((isset($_POST["usuario"]))&&(isset($_POST["password"]))){
     if((is_numeric($_POST["usuario"])) && (ctype_alnum($_POST["password"]))){
          $Sw = UsuarioModel::GetUserLogin($_POST["usuario"],$_POST["password"]);
          if($Sw!=null || $Sw!=false){
            $_SESSION['tiempo'] = time();
            $_SESSION['noDocumento'] = $Sw->noDocumento;
            $_SESSION['idTipoUsuario'] = $Sw->idTipoUsuario;
            $data = [
              'msj'=>'Login correcto ',
              'code'=>'200',
              'status'=>'ok'
            ];          
          }else if($Sw==false || ($Sw==null)){   
            $data = [
              'msj'=>'Usuario o contraseña invalidos',
              'code'=>'200',
              'status'=>'error'
            ];                                                            
          }else{   
            $data = [
              'msj'=>'Usuario o contraseña invalidos',
              'code'=>'200',
              'status'=>'error'
            ];                                                  
          }
     }else{      
      $data = [
        'msj'=>'error de validacion . No se puede ingresar campos que no sean alfanumericos',
        'code'=>'200',
        'status'=>'error'
      ];                  
    }
   }else{ 
    $data = [
      'msj'=>'error de validacion . No se puede ingresar campos nulos',
      'code'=>'200',
      'status'=>'error'
    ];         
   }
}else{
  $data = [
    'msj'=>'error de validacion . No se puede ingresar campos nulos',
    'code'=>'200',
    'status'=>'error'
  ];     
} 
echo json_encode($data);  
?>