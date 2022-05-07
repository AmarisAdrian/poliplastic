<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $sub =  SubproductoModel::GetById($_POST["id"]);
            $sub->codigo = $_POST['codigo'];
            $sub->nombre = $_POST['nombre'];
            if($sub->Update()){
                Core::alert("Correcto","Subproducto actualizado exitosamente","./?view=subproductos");
            }else{
                Core::alert("Error","El subproducto no se pudo actualizar. Verifique que los datos estén correctos y el usuario no exista","./?view=subproductos");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=subproductos");
        }
    }
}
?>