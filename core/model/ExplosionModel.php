<?php
class ExplosionModel{
    public static $Tablename = "explosion";

    public function __construct(){
        $this->id = "";
        $this->pedido = "";
        $this->numero_orden = "";
        $this->fecha = "";
        $this->cliente = "";
        $this->linea = "";
        $this->codigo_producto = ""; 
        $this->extrae_codigo = "";
        $this->descripcion1 = ""; 
        $this->cantidad_planificada = ""; 
        $this->kilos_scrap = "";
        $this->kilos_prod_terminado = "";
        $this->unidades = "";
        $this->peso_prom_unidad = "";
        $this->grupo = "";
        $this->codigo_producto2 = "";
        $this->descripcion2 = "";
        $this->cantidad_consumida = "";
        $this->costo_x_kilo = "";
        $this->costo_total = "";
        $this->comentario = "";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(pedido,numero_orden,fecha,cliente,linea,codigo_producto,extrae_codigo,descripcion1,cantidad_planificada,kilos_scrap,kilos_prod_terminado,unidades,peso_prom_unidad,grupo,codigo_producto2,descripcion2,cantidad_consumida,costo_x_kilo,costo_total,comentario)";
            $sql .= "value(\"$this->pedido\",\"$this->numero_orden\",\"$this->fecha\",\"$this->cliente\",\"$this->linea\",\"$this->codigo_producto\",\"$this->extrae_codigo\",\"$this->descripcion1\",\"$this->cantidad_planificada\",\"$this->kilos_scrap\",\"$this->kilos_prod_terminado\",\"$this->unidades\",
            \"$this->peso_prom_unidad\",\"$this->grupo\",\"$this->codigo_producto2\",\"$this->descripcion2\",\"$this->cantidad_consumida\",\"$this->costo_x_kilo\",\"$this->costo_total\",\"$this->comentario\")";
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
       return Model::one($query[0],new ExplosionModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new ExplosionModel());
    }
    public static function GetCantidadByRef($ref){
      $sql = "select SUM( unidades) as cantidad1 ,SUM(kilos_prod_terminado) as cantidad2  from ".self::$Tablename." where codigo_producto='".$ref."'";
      $query = executor::doit($sql);
      return Model::one($query[0],new ExplosionModel());
  }
    public static function GetCantidadConsumidaMaquila($codigo,$grupo){
        $sql = "select SUM( e.cantidad_consumida) as cantidad from ".self::$Tablename." e where e.codigo_producto = '".$codigo."' and grupo = '".$grupo."' GROUP BY e.grupo, e.codigo_producto";
        $query = executor::doit($sql);
        return Model::one($query[0],new ExplosionModel());
    }
   }
?>
