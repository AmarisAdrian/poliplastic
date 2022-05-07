<?php 
if(isset($_POST)){
    if(isset($_POST['referencia_fabrica']) && isset($_POST['descripcion']) && isset($_POST['idGrupo']) 
        && isset($_POST['idLinea']) && isset($_POST['elemento']) && isset($_POST['codigo_siigo']) && isset($_POST['unidad']) && isset($_POST['peso']) ){
        try{
            $catalogo = new CatalogoModel();
            $catalogo->referencia_fabrica = $_POST['referencia_fabrica'];
            $catalogo->descripcion = $_POST['descripcion'];
            $catalogo->idGrupo = $_POST['idGrupo']; 
            $catalogo->idLinea = $_POST['idLinea'];  
            $catalogo->elemento = $_POST['elemento']; 
            $catalogo->codigo_siigo = $_POST['codigo_siigo']; 
            $catalogo->ajustable_marca = $_POST['ajustable_marca']; 
            $catalogo->unidad = $_POST['unidad']; 
            $catalogo->peso = $_POST['peso']; 
            if($catalogo->Add()){
                Core::alert("Correcto","Se ha insertado una referencia en el catalogo","?view=catalogo");
            }else{
                Core::alert("Error","La referencia no pudo registrada. Verifique que los datos estén correctos y la referencia no exista","?view=catalogo");
            }
        }catch(Exception $ex){
            Core::alert("Error", $ex->getMessage() ,"?view=catalogo");
        }
    }
}
?>