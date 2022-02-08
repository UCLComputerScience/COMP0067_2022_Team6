<?php
PHPSuito_Autoloader::Register ();
class PHPSuito_Autoloader {
	public static function Register() {
		if (function_exists ( '__autoload' )) {
			spl_autoload_register ( '__autoload' );
		}
		return spl_autoload_register ( array (
				'PHPSuito_Autoloader',
				'Load' 
		) );
	}
	public static function Load($pClassName) {
		if ((class_exists ( $pClassName, FALSE ))) {
			return FALSE;
		}
		$pClassFilePath = PHPSUITO_ROOT . $pClassName . '.php';
		if ((file_exists ( $pClassFilePath ) === FALSE) || (is_readable ( $pClassFilePath ) === FALSE)) {
			return FALSE;
		}
		require ($pClassFilePath);
	}
}
?>