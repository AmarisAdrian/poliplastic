<?php
class ProduccionsiinModel{
    public static $Tablename = "produccion_siin ";

    public function __construct(){
        $this->id = "";
        $this->fecha = "";
        $this->codigo_tela = "";
        $this->descripcion_tela = "";
        $this->descripcion = "";
        $this->rollo = "";
        $this->peso = "";
        $this->longitud = "";
        $this->scrap = "";
        $this->conos = "";
        

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(fecha,codigo_tela,descripcion_tela,descripcion,rollo,peso,longitud,scrap,conos)";
            $sql .= "value(\"$this->fecha\",\"$this->codigo_tela\",\"$this->descripcion_tela\",\"$this->descripcion\",\"$this->rollo\",\"$this->peso\",\"$this->longitud\",\"$this->scrap\",\"$this->conos\")";
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
		$sql = "delete from ".self::$Tablename;
		Executor::doit($sql);
    }
    public static function truncate(){
      $bool = false;
      $sql = "TRUNCATE TABLE ".self::$Tablename;
      $res = Executor::doit($sql);
      if($res[0]){
        $bool = true;
      }
      return $bool;
    }   
    public static function DeleteById($id){
		$sql = "delete from ".self::$Tablename." where id=".$id;
		Executor::doit($sql);
    }
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new ProduccionsiinModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new ProduccionsiinModel());
    }
   }
?>