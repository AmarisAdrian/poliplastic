
<?php
function autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	}
}
spl_autoload_register('autoload');
?>
