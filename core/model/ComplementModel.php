<?php
class ComplementModel{
    public static $Tablename_estado_usuario = "estado_usuario";
    public static $Tablename_tipo_usuario = "tipo_usuario";
    public static $Tablename_cuenta_contable = "cuenta_contable";
    public function __construct(){

    }
    public static function GetAllEstadoUsuario(){
        $sql ="select * from ".self::$Tablename_estado_usuario;
        $query = executor::doit($sql);
        return Model::many($query[0],new ComplementModel());
    }
    public static function GetEstadoUsuarioById($id){
        $sql ="select * from ".self::$Tablename_estado_usuario ." where id=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new ComplementModel());
    }
    public static function GetTipoUsuarioById($id){
        $sql ="select * from ".self::$Tablename_tipo_usuario ." where id=".$id;
        $query = executor::doit($sql);
        return Model::one($query[0],new ComplementModel());
    }
    public static function GetAllTipoUsuario(){
        $sql ="select * from ".self::$Tablename_tipo_usuario;
        $query = executor::doit($sql);
        return Model::many($query[0],new ComplementModel());
    }
    public static function GetByreferences($linea,$grupo){
        $sql ="select * from ".self::$Tablename_cuenta_contable." where linea=".$linea." and grupo=".$grupo;   
        $query = executor::doit($sql);
        return Model::one($query[0],new ComplementModel());
    }
    public static function GetAllCuentaContable(){
        $sql ="select * from ".self::$Tablename_cuenta_contable;
        $query = executor::doit($sql);
        return Model::many($query[0],new ComplementModel());
    }
    public static function GetAllCuentaContableByNombre($nombre){
        $sql ="select * from ".self::$Tablename_cuenta_contable ." where id='".$nombre."'";
        $query = executor::doit($sql);
        return Model::one($query[0],new ComplementModel());
    }
    public static function GetAllCuentaContableByid($cuenta){
        $sql ="select * from ".self::$Tablename_cuenta_contable ." where cuenta_contable='".$cuenta."'";
        $query = executor::doit($sql);
        return Model::one($query[0],new ComplementModel());
    }
    public static function HashPassword($Pass){
        return password_hash($Pass, PASSWORD_BCRYPT);
    }
    public static function HashVerifyPassword($Pass,$Hash){
         return  password_verify($Pass,$Hash);
    }
   }
?>
