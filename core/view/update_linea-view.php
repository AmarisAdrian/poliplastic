<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $linea =  LineaModel::GetById($_POST["id"]);
            $linea->codigo = $_POST['codigo'];
            $linea->nombre = $_POST['nombre'];
            if($linea->Update()){
                Core::alert("Correcto","Linea actualizada exitosamente","./?view=linea");
            }else{
                Core::alert("Error","La linea no se pudo actualizar. Verifique que los datos estén correctos y el usuario no exista","./?view=linea");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=linea");
        }
    }
}
?>