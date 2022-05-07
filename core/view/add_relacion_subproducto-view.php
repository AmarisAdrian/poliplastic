<?php 
if(isset($_POST)){
    if(isset($_POST['grupo']) && isset($_POST['codigo'])){
        try{
            $sub = new RelacionarSubproductoModel();
            $sub->grupo_cuenta_contable = $_POST['grupo'];
            $sub->codigo_subproducto = $_POST['codigo'];
            if($sub->Add()){
                Core::alert("Correcto","Relacion creada exitosamente","./?view=subproductos");
            }else{
                Core::alert("Error","No se pudo registrar la relacion. Verifique que los datos estén correctos y el Subproducto no exista","./?view=subproductos");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=subproductos");
        }
    }
}
?>