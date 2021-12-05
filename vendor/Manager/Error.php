<?php
namespace Manager;

class Error
{
	public function __construct()
	{
		echo 'Error instancié!';
		set_error_handler(array('Manager\\Error', 'exception_error_handler')); // il faut obligatoirement que la méthode qui suit soit static
	}
	public static function exception_error_handler($errno, $errstr, $errfile, $errline )
	{
		throw new \ErrorException($errstr, $errno, 0, $errfile, $errline); // le \ permet de retrouver l'espace global pour instancié la vrai classe ErrorException.
	}
}
