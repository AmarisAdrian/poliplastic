<?php
class RelacionDocumentoMaquilaModel{
    public static $Tablename = "relacion_documento_maquila";

    public function __construct(){
        $this->id = "";
        $this->numero_documento = "";
        $this->cod_terminado = "";

    }
    public static function ConsultarExplosion(){
      $sql ="select * from explosion";
      $query = executor::doit($sql);
      return Model::many($query[0],new RelacionDocumentoMaquilaModel());
    }

    public static function ConsultarProduccionDiaria(){
      $sql ="select cod_terminado from produccion_diaria pd group by cod_terminado";
      $query = executor::doit($sql);
      return Model::many($query[0],new RelacionDocumentoMaquilaModel());
    }
    public static function Relacionar(){
     $explosion = self::ConsultarExplosion();
     $Produccion = self::ConsultarProduccionDiaria();
     $Relacion =  new RelacionDocumentoMaquilaModel();
     $sw = false;
        if (is_array($explosion) && is_array($Produccion)) {

          if (count($explosion) > 0 && count($Produccion) > 0) {
              $cont = 1;
              foreach ($Produccion as $Produccion) {
                $stringDate = date('Ym' . str_pad($cont, 3, "0", STR_PAD_LEFT)); 
                $Relacion->numero_documento =  $stringDate; 
                $Relacion->cod_terminado = $Produccion->cod_terminado;
                if ($Relacion->Add()) {
                  $sw = true;                                 
               } else {
                  $sw = false;                               
              }
              $cont++;
              }         
          }
        }
        return $sw;
    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(numero_documento,cod_terminado)";
            $sql .= "value(\"$this->numero_documento\",\"$this->cod_terminado\")";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;

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
       return Model::one($query[0],new RelacionDocumentoMaquilaModel());
    }
    public static function GetByCodigo($id){
        $sql = "select * from ".self::$Tablename." where codigo=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new RelacionDocumentoMaquilaModel());
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new RelacionDocumentoMaquilaModel());
    }
   }
?>
