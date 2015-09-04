<?php
	class util{
		//formatea fechas
		public function formateaFecha($fecha){
			$newFecha=explode("/",$fecha);
			return $newFecha[2]."-".$newFecha[1]."-".$newFecha[0];
		}
		
		//formatea tipo de usuario
		public function userType($type){
			switch($type){
				case 1: 
					$label="User";
					break;
				case 2: 
					$label="Bike";
					break;
				case 3: 
					$label="Order Admin";
					break;
				case 4: 
					$label="Admin";
					break;
			}
			return $label;
		}
		
		//retorna el numero de registros por pagina
		public function registrosPorPagina(){
			return 10;
		}
	}
?>