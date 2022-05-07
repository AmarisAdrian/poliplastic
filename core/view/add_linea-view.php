<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $usuario = new LineaModel();
            $usuario->codigo = $_POST['codigo'];
            $usuario->nombre = $_POST['nombre'];
            if($usuario->Add()){
                Core::alert("Correcto","Linea registrada exitosamente","./?view=linea");
            }else{
                Core::alert("Error","La linea no se pudo registrar. Verifique que los datos estén correctos y el usuario no exista","./?view=linea");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=linea");
        }
    }
}
?>