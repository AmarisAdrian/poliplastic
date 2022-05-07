<?php
class RelacionarSubproductoModel{
    public static $Tablename = "relacion_subproducto";

    public function __construct(){
        $this->id = "";
        $this->grupo_cuenta_contable = "";
        $this->codigo_subproducto = "";
    }
    public function Add(){
        $bool = false;
        try{
            $codigo = $this->grupo_cuenta_contable;
            $nombre = $this->codigo_subproducto;
            $sql = "insert into ".self::$Tablename."(grupo_cuenta_contable,codigo_subproducto)";
            $sql .= "value('".$codigo."','".$nombre."')";
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
            $sql = "update ".self::$Tablename." set grupo_cuenta_contable=\"$this->grupo_cuenta_contable\",codigo_subproducto=\"$this->codigo_subproducto\" where id=$this->id";
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
       return Model::one($query[0],new RelacionarSubproductoModel());
    }
    public static function GetByCodigo($codigo_subproducto){
        $sql = "select * from ".self::$Tablename." where codigo_subproducto='".$codigo_subproducto."'";
        $query = executor::doit($sql);
        return Model::one($query[0],new RelacionarSubproductoModel());
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new RelacionarSubproductoModel());
    }
   }
?>
