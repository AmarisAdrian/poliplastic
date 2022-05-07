<?php
date_default_timezone_set('America/Bogota');
if(!isset($_GET["action"])){
	 Module::loadLayout("index");
}else{
	Action::load($_GET["action"]);
}
?>
