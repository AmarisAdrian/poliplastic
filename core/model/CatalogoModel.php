<?php
class CatalogoModel{
    public static $Tablename = "catalogo";

    public function __construct(){
        $this->id = "";
        $this->referencia_fabrica = "";
        $this->descripcion = "";
        $this->idLinea = "";
        $this->idGrupo = "";
        $this->elemento = "";
        $this->codigo_siigo = "";
        $this->ajustable_marca = "";
        $this->unidad = "";
        $this->peso = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(referencia_fabrica,descripcion,idLinea,idGrupo,elemento,codigo_siigo,ajustable_marca,unidad,peso)";
            $sql .= "value(\"$this->referencia_fabrica\",\"$this->descripcion\",\"$this->idLinea\",\"$this->idGrupo\",\"$this->elemento\",\"$this->codigo_siigo\",\"$this->ajustable_marca\",\"$this->unidad\",\"$this->peso\")";
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
            $sql = "update ".self::$Tablename." set referencia_fabrica=\"$this->referencia_fabrica\", descripcion=\"$this->descripcion\", idLinea=\"$this->idLinea\", idGrupo=\"$this->idGrupo\", elemento=\"$this->elemento\", codigo_siigo=\"$this->codigo_siigo\", ajustable_marca=\"$this->ajustable_marca\", unidad=\"$this->unidad\", peso=\"$this->peso\" where id=$this->id";       
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
       return Model::one($query[0],new CatalogoModel());
    }

    public static function GetByReferencia($referencia){
        $sql = "select * from ".self::$Tablename." where codigoSap='".$referencia."'";
        $query = executor::doit($sql);
        return Model::one($query[0],new CatalogoModel());
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new CatalogoModel());
    }
   }
?>
