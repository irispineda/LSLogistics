<?php
	function defineMenu(){
		session_start();
		$type=$_SESSION['type'];
		
		if($type==1){
			//usuario cualquiera
		}else if($type==2){
			//motoristas
		}else if($type==3){
			//administrador de ordenes
		}else if($type==4){
			//administrador de sistema
		}
		
	}
?>