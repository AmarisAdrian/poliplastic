<?php 
if(isset($_POST)){
    if(isset($_POST['idLinea']) && isset($_POST['idGrupo']) && isset($_POST['cta_inventario']) && isset($_POST['cta_costo']) && isset($_POST['cta_venta']) && isset($_POST['cta_devolucion']) && isset($_POST['cta_compra'])
    && isset($_POST['cta_deb_ja']) && isset($_POST['cta_cred_aj']) && isset($_POST['cta_ivadif_vta']) && isset($_POST['cta_ivadif_comp'])){
        try{
            $inventario = new LineaInventarioModel();
            $inventario->idLinea = $_POST['idLinea'];
            $inventario->idGrupo = $_POST['idGrupo'];
            $inventario->cta_inventario = $_POST['cta_inventario'];
            $inventario->cta_costo = $_POST['cta_costo'];
            $inventario->cta_venta = $_POST['cta_venta'];
            $inventario->cta_devolucion = $_POST['cta_devolucion'];
            $inventario->cta_compra = $_POST['cta_compra'];
            $inventario->cta_deb_ja = $_POST['cta_deb_ja'];
            $inventario->cta_cred_aj = $_POST['cta_cred_aj'];
            $inventario->cta_ivadif_vta = $_POST['cta_ivadif_vta'];
            $inventario->cta_ivadif_comp = $_POST['cta_ivadif_comp'];
            if($inventario->Add()){
                Core::alert("Correcto","Linea inventario registrado exitosamente","./?view=linea_inventario");
            }else{
                Core::alert("Error","El grupo no se pudo registrar. Verifique que los datos estén correctos y el usuario no exista","./?view=linea_inventario");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"./?view=linea_inventario");
        }
    }
}
?>
