<?php 
class MaquilaModel {
    public static $Tablename = "maquila";
    public function __construct(){
        $this->id = "";
        $this->tipo_comprobante= "";
        $this->codigo_comprobante = "o";
        $this->numero_documento = "";
        $this->cuenta_contable = "";
        $this->dc = "";
        $this->valor_secuencia= "";
        $this->ano_documento = date("Y");
        $this->mes_documento = date("m");
        $this->dia_documento= date("d");
        $this->codigo_vendedor = 1;
        $this->codigo_ciudad =1;
        $this->codigo_zona = 1;
        $this->secuencia = "";
        $this->centro_costo = "";
        $this->subcentro_costo = "";
        $this->nit = ""; 
        $this->sucursal= "";
        $this->descripcion_secuencia = "";
        $this->linea_produccion = "";
        $this->grupo_produccion = "";
        $this->codigo_producto = "";
        $this->cantidad = "";
        $this->cantidad2 = "";
        $this->codigo_bodega = "";
        $this->codigo_ubicacion = "";
        $this->cantidad_factor_conversion = "";
        $this->operador_factor_conversion = "";
        $this->valor_factor_conversion = "";
    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(tipo_comprobante,codigo_comprobante,numero_documento,cuenta_contable,dc,valor_secuencia,ano_documento,mes_documento,dia_documento,codigo_vendedor,codigo_ciudad,codigo_zona,secuencia,
            centro_costo,subcentro_costo,sucursal,descripcion_secuencia,linea_produccion,grupo_produccion,codigo_producto,cantidad,cantidad2,codigo_bodega,codigo_ubicacion,cantidad_factor_conversion,operador_factor_conversion,valor_factor_conversion)";
            $sql .= "value(\"$this->tipo_comprobante\",\"$this->codigo_comprobante\",\"$this->numero_documento\",\"$this->cuenta_contable\",\"$this->dc\",\"$this->valor_secuencia\",\"$this->ano_documento\",\"$this->mes_documento\",\"$this->dia_documento\",
            \"$this->codigo_vendedor\",\"$this->codigo_ciudad\",\"$this->codigo_zona\",\"$this->secuencia\",\"$this->centro_costo\",\"$this->subcentro_costo\",\"$this->sucursal\",\"$this->descripcion_secuencia\",\"$this->linea_produccion\",
            \"$this->grupo_produccion\",\"$this->codigo_producto\",\"$this->cantidad\",\"$this->cantidad2\",\"$this->codigo_bodega\",\"$this->codigo_ubicacion\",\"$this->cantidad_factor_conversion\",\"$this->operador_factor_conversion\",\"$this->valor_factor_conversion\")";
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
       return Model::one($query[0],new MaquilaModel());
    }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new MaquilaModel());
    }

}
?>