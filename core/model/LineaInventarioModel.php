<?php
class LineaInventarioModel{
    public static $Tablename = "linea_inventario";

    public function __construct(){
        $this->id = "";
        $this->idLinea = "";
        $this->idGrupo = "";
        $this->cta_inventario = "";
        $this->cta_costo = "";
        $this->cta_venta = "";
        $this->cta_devolucion = ""; 
        $this->cta_compra = "";
        $this->cta_deb_ja = ""; 
        $this->cta_cred_aj = ""; 
        $this->cta_ivadif_vta = "";
        $this->cta_ivadif_comp = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(idLinea,idGrupo,cta_inventario,cta_costo,cta_venta,cta_devolucion,cta_compra,cta_deb_ja,cta_cred_aj,cta_ivadif_vta,cta_ivadif_comp)";
            $sql .= "value(\"$this->idLinea\",\"$this->idGrupo\",\"$this->cta_inventario\",\"$this->cta_costo\",\"$this->cta_venta\",\"$this->cta_devolucion\",\"$this->cta_compra\",\"$this->cta_deb_ja\",\"$this->cta_cred_aj\",\"$this->cta_ivadif_vta\",\"$this->cta_ivadif_comp\")";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;

    }
    public function Update(){
        $bool = false;
        try{
            $sql = "update ".self::$Tablename." set idLinea=\"$this->idLinea\",idGrupo=\"$this->idGrupo\", cta_inventario=\"$this->cta_inventario\",cta_costo=\"$this->cta_costo\",cta_venta=\"$this->cta_venta\",cta_devolucion=\"$this->cta_devolucion\", cta_compra=\"$this->cta_compra\",cta_deb_ja=\"$this->cta_deb_ja\",cta_cred_aj=\"$this->cta_cred_aj\",cta_ivadif_vta=\"$this->cta_ivadif_vta\",cta_ivadif_comp=\"$this->cta_ivadif_comp\" where id=$this->id";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;
    }
    public function Delete(){
		$sql = "delete from ".self::$Tablename." where id=$this->id";
		Executor::doit($sql);
	}
    public static function DeleteById($id){
		$sql = "delete from ".self::$Tablename." where id=".$id;
		Executor::doit($sql);
    } 
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new LineaInventarioModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new LineaInventarioModel());
    }
   }
?>
