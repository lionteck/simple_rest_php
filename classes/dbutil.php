<?php
class dbUtil{
	private $db;
	private $str_conn;
	private $user;
	private $pass;
	private $res;
	private $queries;
	function __construct($str_conn,$user,$pass,$dbname){
		$this->str_conn=$str_conn;
		$this->user=$user;
		$this->pass=$pass;
		$this->db=  new mysqli($str_conn, $user, $pass, $dbname);
		
	}
	
	function result_query_named($name,$pars){
		$sql=bindText($this->queries[$name],$pars);
		return $this->get_result($sql);
		
	}
	
	function query($sql){
		try{
			$this->db->query($sql);
		}
		catch(Exception $e){
           echo 'Error : '.$e;
        }
		return $this->db->insert_id;;
	}
	
	function get_result($sql,$row=TRUE){
		try{
			if($row){
				$res=$this->db->query($sql);
				if($res){
					$this->res=$res;
					$ress=$res->fetch_array(MYSQLI_ASSOC);
				}
				else{
					echo $sql;
				}
			}
			else{
				$ress=array();
				$res=$this->db->query($sql);
				if($res){
					$this->res=$res;
					while(($arr=$res->fetch_array(MYSQLI_ASSOC))!=null){
						$ress[]=$arr;
					}
				}
				else{
					echo $sql;
				}
			}
		}
		catch(Exception $e){
           var_dump($e);
        }
		
		return $ress;
	}
	
	function is_empty(){
		if($this->res->num_rows==0){
			return true;
		}
		return false;
	}
}

function bindText($text,$attrs){
	$reg='/{{+[A-Za-z_]+}}/';
	preg_match_all($reg, $text, $matches);


	for($x=0;$x<count($matches[0]);$x++){
		$name_attr=substr($matches[0][$x],2,strlen($matches[0][$x])-4);
		if(isset($attrs[$name_attr])){
			$text=str_replace($matches[0][$x],$attrs[$name_attr],$text);
		}
	}
	return $text;
}

?>
