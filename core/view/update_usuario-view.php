<?php 
if(isset($_POST)){
    if(isset($_POST['idEstadoUsuario']) && isset($_POST['idTipoUsuario']) && isset($_POST['noDocumento']) 
        && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['movil']) && isset($_POST['email']) ){
        try{
            $usuario =  UsuarioModel::GetById($_POST["id"]);
            $usuario->idEstadoUsuario = $_POST['idEstadoUsuario'];
            $usuario->idTipoUsuario = $_POST['idTipoUsuario'];
            $usuario->noDocumento = $_POST['noDocumento']; 
            $usuario->nombre = $_POST['nombre'];  
            $usuario->apellido = $_POST['apellido']; 
            $usuario->movil = $_POST['movil']; 
            $usuario->email = $_POST['email']; 
            if($usuario->Update()){
                Core::alert("Correcto","Usuario se ha actualizado exitosamente","?view=usuario");
            }else{
                Core::alert("Error","Usuario se pudo actualizar. Verifique que los datos estén correctos","?view=usuario");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"?view=usuario");
        }
    }
}
?>