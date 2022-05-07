<?php
class ProduccionDiariaModel{
    public static $Tablename = "produccion_diaria ";

    public function __construct(){
        $this->id = "";
        $this->fecha = "";
        $this->cliente = "";
        $this->nombre_cliente = "";
        $this->pedido = "";
        $this->lote = "";
        $this->cod_terminado = "";          
        $this->descripcion_producto_terminado = "";
        $this->dpt = "";    
        $this->cantidad = ""; 
        $this->peso = ""; 
        $this->tipo = "";
        $this->op = "";
        $this->ent_prov = "";
        $this->orden = "";
        $this->linea = "";
        $this->grupo = "";
        $this->codigo = "";
        $this->valor1 = "";
        $this->cuenta = "";
        $this->dc = "";
        $this->descripcion = "";
        $this->valor2 = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(fecha,cliente,nombre_cliente,pedido,lote,cod_terminado,descripcion_producto_terminado,dpt,cantidad,peso,tipo,op,ent_prov,orden,linea,grupo,codigo,valor1,cuenta,dc,descripcion,valor2)";
            $sql .= "value(\"$this->fecha\",\"$this->cliente\",\"$this->nombre_cliente\",\"$this->pedido\",\"$this->lote\",\"$this->cod_terminado\",\"$this->descripcion_producto_terminado\",\"$this->dpt\",\"$this->cantidad\",\"$this->peso\",\"$this->tipo\",\"$this->op\",\"$this->ent_prov\"
            ,\"$this->orden\",\"$this->linea\",\"$this->grupo\",\"$this->codigo\",\"$this->valor1\",\"$this->cuenta\",\"$this->dc\",\"$this->descripcion\",\"$this->valor2\")";
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
    public static function GetByCuenta($cuenta){
        $sql = "select * from ".self::$Tablename." where cuenta=".$cuenta;
        $query = executor::doit($sql);
        return Model::one($query[0],new ProduccionDiariaModel());
     }
     public static function GetCuentaByref($ref){
      $sql = "select * from ".self::$Tablename." where cod_terminado='".$ref."'";
      $query = executor::doit($sql);
      return Model::one($query[0],new ProduccionDiariaModel());
   }
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where cod_terminado=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new ProduccionDiariaModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new ProduccionDiariaModel());
    }
   }
?>