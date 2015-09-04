<?php
	class validate{
		public function verificaUsuarioLogueado(){
			if(isset($_SESSION['user'])==false or isset($_SESSION['type'])==false){
				return 0;
			}else{
				return $_SESSION['type'];
			}
		}
	}
?>