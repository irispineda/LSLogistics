<?php
	class bd{
		//variable para el enlace a la bd
		private $link;
		
		// Conectando, seleccionando la base de datos
		public function conectar(){
			$this->link = mysqli_connect('localhost', 'root', '', 'scoem') 
			or die('No se pudo conectar: ' . mysql_error());
		}
		
		// Cerrar la conexión
		public function cerrar(){
			mysqli_close($this->link);
		}
		
		public function consultar($query){
			$result = mysqli_query($this->link,$query) or die('Consulta fallida: ' . mysql_error());
			
			return $result;
		}
		
		// Liberar resultados
		public function liberar($result){
			mysqli_free_result($result);
		}
		
		/*
		 * Arma where con los campos y valores enviados para concatenar a la where.
		 * param: $addWhere, booleana, true indica que se debe agregar la sentencia WHERE en la cadena.
		 * param: $params, arreglo, (campo, arreglo(valor de consulta, operador de consulta)).
		 * author: Iris Pineda.
		 * date: 01/09/2015.
		 */
		public function armaWhere($addWhere,$params){
			$where="";
			foreach($params as $campo => $valor){
				if(empty($valor[0])==false){
					if(empty($where)){
						$where= $campo." ".$valor[1]." '".$valor[0]."' ";
					}else{
						$where = $where." AND ".$campo." ".$valor[1]." '".$valor[0]."' ";
					}
				}
			}
			if($addWhere==true) $where="WHERE ".$where;
			
			return $where;
		}
	}
?>