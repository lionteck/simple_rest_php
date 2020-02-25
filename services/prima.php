<?php
class prima extends model{
	public $ret;
	
	public function ciao(){
		global $db;
		$comuni=$db->get_result("SELECT * FROM cron_search",false);
		$this->ret=array();
		foreach($comuni as $user){
			$this->ciao2($user);
		}
		$this->ret['users']=$comuni;
		$this->write($this->ret);
		$this->load("seconda","ciao");
		
	}
	
	public function ciao2($user){
		global $db;
		/*$tickets=$db->get_result("SELECT * FROM wp_tickets_user WHERE wp_userid=".$user['ID'],false);
		$user['tickets']=$tickets;*/
		
	}
}

?>
