<?php

class loader{
	private $auth;
	
	function load($class_name,$proc_name){
		if(file_exists('services/'.$class_name.'.php')){
			require_once('services/'.$class_name.'.php');
			if(class_exists($class_name)){
				$r = new ReflectionClass($class_name);
				$obj=$r->newInstance();
				if(method_exists($obj,$proc_name)){
					$method=$r->getMethod($proc_name);
					return $method->invoke($obj);
					die();
				}
				echo 'procs not exists';
				die();
			}
			echo 'service not exists';
			die();
		}
		echo 'file not exists';
		die();
		
	}
	
}


?>
