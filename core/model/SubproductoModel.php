<?php
class SubproductoModel{
    public static $Tablename = "subproducto";

    public function __construct(){
        $this->id = "";
        $this->codigo = "";
        $this->nombre = "";
        $this->grupo = "";
    }
    public function Add(){
        $bool = false;
        try{
            $codigo = $this->codigo;
            $nombre = $this->nombre;
            $sql = "insert into ".self::$Tablename."(codigo,nombre)";
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
            $sql = "update ".self::$Tablename." set codigo=\"$this->codigo\",nombre=\"$this->nombre\,grupo=\"$this->grupo\" where id=$this->id";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;
    }
    public function UpdateGrupo(){
        $bool = false;
        $grupo = $this->grupo;
        try{
            $sql = "update ".self::$Tablename." set  grupo='".$grupo."' where id=$this->id";
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
       return Model::one($query[0],new SubproductoModel());
    }
    public static function GetByCodigo($id){
        $sql = "select * from ".self::$Tablename." where codigo=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new SubproductoModel());
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new SubproductoModel());
    }
   }
?>
