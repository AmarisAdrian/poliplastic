<?php 
 try{
    $usuario =  UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
    $usuario->id = $usuario->id;
    $usuario->ultima_actividad = $usuario->ultima_actividad;
    if($usuario->UpdateLastActivity()){
        Core::alert("Correcto","Usuario se ha actualizado exitosamente","?view=usuario");
    }else{
        Core::alert("Error","Usuario se pudo actualizar. Verifique que los datos estén correctos","?view=usuario");
    }
}catch(Exception $ex){
    Core::alert("Error", $ex->getMessage() ,"?view=usuario");
}
    ?>