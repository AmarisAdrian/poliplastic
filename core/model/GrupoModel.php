<?php
class GrupoModel{
    public static $Tablename = "grupo";

    public function __construct(){
        $this->id = "";
        $this->codigo = "";
        $this->nombre = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(codigo,nombre)";
            $sql .= "value(\"$this->codigo\",\"$this->nombre\")";
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
            $sql = "update ".self::$Tablename." set codigo=\"$this->codigo\",nombre=\"$this->nombre\" where id=$this->id";
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
       return Model::one($query[0],new GrupoModel());
    }
    public static function GetByCodigo($id){
        $sql = "select * from ".self::$Tablename." where codigo=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new GrupoModel());
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new GrupoModel());
    }
   }
?>
