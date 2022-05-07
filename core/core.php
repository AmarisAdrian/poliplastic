<?php
class core {
	public static $debug_sql = false;
	
	public static function alert($estado, $texto, $url){
		switch ($estado) {
			case 'Correcto':
				$estado = 'success';
				$titulo = '¡Buen trabajo!';
			break;
			case 'Error':
				$estado = 'error';
				$titulo = '¡ha ocurrido un error!';
			break;
			case 'Advertencia':
				$estado = 'warning';
				$titulo = '¡Advertencia!';
			break;
			case 'Info':
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
			case 'Pregunta':
				$estado = 'question';
				$titulo = '¡Atención!';
			break;
			default:
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
		}
		echo "<script language = javascript> swal.fire({ title:'".$titulo."', text:'".$texto."', type:'".$estado."', }).then((result)=>{window.location='".$url."';});</script>";
	}
	public static function message($estado, $texto){
		switch ($estado) {
			case 'Correcto':
				$estado = 'success';
				$titulo = '¡Buen trabajo!';
			break;
			case 'Error':
				$estado = 'error';
				$titulo = '¡ha ocurrido un error!';
			break;
			case 'Advertencia':
				$estado = 'warning';
				$titulo = '¡Advertencia!';
			break;
			case 'Info':
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
			case 'Pregunta':
				$estado = 'question';
				$titulo = '¡Atención!';
			break;
			default:
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
		}
		echo "<script language = javascript> swal.fire({ title:'".$titulo."', text:'".$texto."', type:'".$estado."' })</script>";

	}
	public static function redir_log($url){
		echo "<script> window.location='".$url."';</script>";
	}
	public static function redir($msj,$url){
		echo "<script>alert('".$msj."'); window.location='".$url."';</script>";
	}
}
?>
