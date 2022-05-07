<?php 
if(isset($_POST["id"]) && isset($_POST["nueva_password"]) && isset($_POST["repetir_password"])){
    $nueva_contraseña = $_POST["nueva_password"];
    $repetir_contraseña = $_POST["repetir_password"];
    if( $nueva_contraseña == $repetir_contraseña ){
        try{
            $usuario =  UsuarioModel::GetById($_POST["id"]);
            $usuario->password =  ComplementModel::HashPassword($_POST['nueva_password']);
            if($usuario->UpdatePassword()){
                Core::alert("Correcto","Contraseña actualizada exitosamente","?view=perfil");
            }else{
                Core::redir("No se pudo actualizar la contraseña. Verifique que los datos estén correctos","?view=perfil");
            }
        }catch(Exception $ex){
            Core::redir("Error", $ex->getMessage() ,"?view=perfil");
         }
    }else{
        Core::alert("Error","Las contraseñas no coinciden","?view=perfil");
    }
}
