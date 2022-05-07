<?php 
if(isset($_SESSION)){
    try{
        $usuario =  UsuarioModel::GetByDocumento($_SESSION['noDocumento']);
        $usuario->id = $usuario->id;
        if($usuario->UpdateLastActivity()){
            session_destroy();
            Core::redir_log("./?view=home");
        }else{
            session_destroy();
            Core::redir_log("./?view=home");
        }
    }catch(Exception $ex){
        Core::alert("Error", $ex->getMessage() ,"?view=usuario");
    }  
}

?>