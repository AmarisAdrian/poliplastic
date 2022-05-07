<?php
class Database {
	public static $db;
//	public static $con;
	public static $data;
	function __construct($user="root",$pass="root", $host="127.0.0.1",$ddbb="poliplastic",$port="3306"){	       		
		$this->user=$user;
		$this->pass=$pass;
		$this->host=$host;
		$this->ddbb=$ddbb;
		$this->port=$port;
	}	 
  	function connect(){
		try
		{

			$data= new mysqli($this->host,$this->user,$this->pass,$this->ddbb,$this->port);			
			$data->query("SET SQL_MODE='';");
			$data->query("SET NAMES 'UTF8'");
			if (mysqli_connect_errno()) {
				$data = [
					'msj'=>'error al conectar a la base de datos',
					'code'=>'500'
				]; 
			}
		}catch(exception $ex){
			$data = [
				'msj'=>'error al conectar a la base de datos',
				'code'=>'500'
			];
		}
		return $data;
	}
	public static function getCon(){
		try
		{
			//if(self::$con==null && self::$db==null){
				if(self::$data==null && self::$db==null){
				self::$db = new Database();
				self::$data = self::$db->connect();
				//self::$con = self::$db->connect();
			}
		}catch(exception $ex){
			throw $ex;
		}
		return self::$data;
	}
}
?>
