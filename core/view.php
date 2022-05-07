<?php

class View {

	public static function load($view){
		if(!isset($_GET['view'])){ 			
			if(!isset($_GET['view'])){
				core::redir_log("?view=home");
			}else{
				include "core/view/".$_GET['view']."-view.php";
			}

		}else{
			if(View::isValid()){
				include "core/view/".$_GET['view']."-view.php";				
			}else{				
				core::redir_log("?view=404&error=".$_GET['view']);
			}
		}
	}
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			if(file_exists($file = "core/view/".$_GET['view']."-view.php"))
		  	{
				$valid = true;
			}
		}
		return $valid;
	}
	public static function Error($message){
		print $message;
	}
}
?>