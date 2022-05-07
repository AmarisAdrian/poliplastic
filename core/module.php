<?php
class Module {

	public static function loadLayout()
	{
	 include "core/view/login-view.php";	
	}
	public static function LoadTypeLayout($Rol)
	{	 
		if($Rol==1){
			include "core/layout/admin/layout_admin.php";
		}
		else if($Rol==2)
		{
			include "core/layout/user/layout_user.php";
		}
	}
}
?>
