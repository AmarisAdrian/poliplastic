<?php 
if(isset($_POST)){
    if(isset($_POST['codigo']) && isset($_POST['nombre'])){
        try{
            $sub = new SubproductoModel();
            $sub->codigo = $_POST['codigo'];
            $sub->nombre = $_POST['nombre'];
            if($sub->Add()){
                Core::alert("Correcto","Subproducto registrado exitosamente","./?view=subproductos");
            }else{
                Core::alert("Error","El subproducto no se pudo registrar. Verifique que los datos estén correctos y el Subproducto no exista","./?view=subproductos");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=subproductos");
        }
    }
}
?>