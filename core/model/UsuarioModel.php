<?php
class UsuarioModel{
    public static $Tablename = "usuario";

    public function __construct(){
        $this->id = "";
        $this->idTipoUsuario = "";
        $this->idEstadoUsuario = "";
        $this->noDocumento = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->password = "";
        $this->movil = "";
        $this->email = "";
        $this->ultima_actividad ="";

    }
    public function Add(){
        $bool = false;
        try{
            $sql = "insert into ".self::$Tablename."(idTipoUsuario,idEstadoUsuario,noDocumento,nombre,apellido,password,movil,email)";
            $sql .= "value(\"$this->idTipoUsuario\",\"$this->idEstadoUsuario\",\"$this->noDocumento\",\"$this->nombre\",\"$this->apellido\",\"$this->password\",\"$this->movil\",\"$this->email\")";
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
            $sql = "update ".self::$Tablename." set idTipoUsuario=\"$this->idTipoUsuario\",idEstadoUsuario=\"$this->idEstadoUsuario\",noDocumento=\"$this->noDocumento\",nombre=\"$this->nombre\",apellido=\"$this->apellido\",movil=\"$this->movil\",email=\"$this->email\" where id=$this->id";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;
    }
    public function UpdateLastActivity(){
        $bool = false;
        try{
            $sql = "update ".self::$Tablename." set ultima_actividad=now() where id=$this->id";
            $res = Executor::doit($sql);
            if($res[0]){
                $bool = true;
            }
        }catch(Exception $ex){
           throw $ex->getMessage();
        }
        return $bool;
    }
    public function UpdatePassword(){
        $bool = false;
        try{
            $sql = "update ".self::$Tablename." set password=\"$this->password\" where id=$this->id";
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
    public static function GetByDocumento($noDocumento){
        $sql = "select * from ".self::$Tablename." where noDocumento=".$noDocumento;
        $query = executor::doit($sql);
        return Model::one($query[0],new UsuarioModel());
     }
    public static function GetById($id){
       $sql = "select * from ".self::$Tablename." where id=".$id;
       $query = executor::doit($sql);
       return Model::one($query[0],new UsuarioModel());
    }

     public static function GetUserLogin($usuario,$password){
        $user =  self::GetByDocumento($usuario);
        if($user){
            $password = ComplementModel::HashVerifyPassword($password,$user->password);
            if($password){
                $sql = "select * from ".self::$Tablename." where noDocumento=".$usuario." and idEstadoUsuario=1";
                $query = executor::doit($sql);
                return Model::one($query[0],new UsuarioModel());
            }else{
                return  $password;
            }
        } else{
            return $user;
        }
        return $user;
       
     }
    public static function GetAll(){
        $sql ="select * from ".self::$Tablename;
        $query = executor::doit($sql);
        return Model::many($query[0],new UsuarioModel());
    }
    public function GetLike($q){
        $sql ="select * from ".self::$Tablename."where nombre like '%$q%'";
        $query = executor::doit($sql);
        return Model::many($query[0],new UsuarioModel());
    }
   }
?>
