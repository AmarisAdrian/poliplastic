<?php 
if(isset($_GET["id"])){
    try{
        $usuario =  UsuarioModel::GetById($_GET["id"]);
        $usuario->password =  ComplementModel::HashPassword($usuario->noDocumento);
        if($usuario->UpdatePassword()){
            Core::redir("Contraseña actualizada","?view=usuario");
        }else{
            Core::redir("No se pudo actualizar la contraseña. Verifique que los datos estén correctos","?view=usuario");
        }
    }catch(Exception $ex){
        Core::redir("Error", $ex->getMessage() ,"?view=usuario");
    }
}
?>