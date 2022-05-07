<?php
class ProduccionSapModel{
    public static $Tablename = "produccion_sap ";

    public function __construct(){
        $this->id = "";
        $this->numero_orden = "";
        $this->fecha_orden = "";
        $this->estado = "";
        $this->grupo = "";
        $this->codigo_producto = "";
        $this->cantidad_planificada = "";
        $this->codigo_producto2 = "";
        $this->cantidad_consumida = "";
        $this->comentario = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(numero_orden,fecha_orden,estado,grupo,codigo_producto,cantidad_planificada,codigo_producto2,cantidad_consumida,comentario)";
            $sql .= "value(\"$this->numero_orden\",\"$this->fecha_orden\",\"$this->estado\",\"$this->grupo\",\"$this->codigo_producto\",\"$this->cantidad_planificada\",\"$this->codigo_producto2\",\"$this->cantidad_consumida\",\"$this->comentario\")";
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
       return Model::one($query[0],new ProduccionSapModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new ProduccionSapModel());
    }
   }
?>