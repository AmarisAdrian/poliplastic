<?php 
if(isset($_POST)){
    if(isset($_POST['idEstadoUsuario']) && isset($_POST['idTipoUsuario']) && isset($_POST['noDocumento']) 
        && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['movil']) && isset($_POST['email']) ){
        try{
            $usuario = new UsuarioModel();
            $usuario->idEstadoUsuario = $_POST['idEstadoUsuario'];
            $usuario->idTipoUsuario = $_POST['idTipoUsuario'];
            $usuario->noDocumento = $_POST['noDocumento']; 
            $usuario->password = ComplementModel::HashPassword($_POST['noDocumento']); 
            $usuario->nombre = $_POST['nombre'];  
            $usuario->apellido = $_POST['apellido']; 
            $usuario->movil = $_POST['movil']; 
            $usuario->email = $_POST['email']; 
            if($usuario->Add()){
                Core::alert("Correcto","Usuario se ha registrado exitosamente","?view=usuario");
            }else{
                Core::alert("Error","Usuario se pudo registrar. Verifique que los datos estén correctos y el usuario no exista","?view=usuario");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"?view=usuario");
        }
    }
}
?>