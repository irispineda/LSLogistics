<?php
	class user{
		
		//formatea tipo de usuario
		public function getType($type){
			$label="";
			switch($type){
				case 1: 
					$label="User";
					break;
				case 2: 
					$label="Biker";
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
		
		//formatea el estado del usuario
		public function getEstate($estate){
			$label="";
			switch($estate){
				case 0:
					$label="Registered";
					break;
				case 1:
					$label="Activated";
					break;
				case 2:
					$label="Inactive";
					break;
			}
			return $label;
		}
	}
?>