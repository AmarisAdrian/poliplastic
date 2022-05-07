<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $usuario = new GrupoModel();
            $usuario->codigo = $_POST['codigo'];
            $usuario->nombre = $_POST['nombre'];
            if($usuario->Add()){
                Core::alert("Correcto","grupo registrado exitosamente","./?view=grupo");
            }else{
                Core::alert("Error","El grupo no se pudo registrar. Verifique que los datos estén correctos y el grupo no exista","./?view=grupo");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=grupo");
        }
    }
}
?>