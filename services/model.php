<?php

class model{
	
	public function write($obj){
		global $ret;
		array_push($ret,$obj);
	}
	
	public function load($class_name,$proc_name){
		global $loader;
		$loader->load("seconda","ciao");
	}
	
}

?>
