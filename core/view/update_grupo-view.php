<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $linea =  GrupoModel::GetById($_POST["id"]);
            $linea->codigo = $_POST['codigo'];
            $linea->nombre = $_POST['nombre'];
            if($linea->Update()){
                Core::alert("Correcto","Grupo actualizado exitosamente","./?view=grupo");
            }else{
                Core::alert("Error","El grupo no se pudo actualizada. Verifique que los datos estén correctos y el usuario no exista","./?view=grupo");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=grupo");
        }
    }
}
?>