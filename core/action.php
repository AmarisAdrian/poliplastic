<?php

class Action {

	public static function load($action){

		if(!isset($_GET['action'])){
			include "./core/action/".$action."-action.php";
		}else{

			if(Action::isValid()){
				include "./core/action/".$_GET['action']."-action.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>");
			}
		}
	}
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "./core/action/".$_GET['action']."-action.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "./core/action/".$action."-action.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}
	}

}



?>