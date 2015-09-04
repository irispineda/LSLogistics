<?php
	require "bd.php";
	
	class validate{
		
		public function verificaUsuarioLogueado(){
			if(isset($_SESSION['user'])==false or isset($_SESSION['type'])==false){
				return 0;
			}else{
				return $_SESSION['type'];
			}
			return 0;
		}
		
		public function verificaLogin(){
			if(isset($_POST["username"])){
				$user=$_POST["username"];
				$pass=$_POST["passwd"];
				
				//consulta para obtener los datos
				$bd = new bd();
				$bd->conectar();
				$where=$bd->armaWhere(true,array("username"=>array($user,"="),
												 "password"=>array($pass,"=")));
				$query = ' SELECT name,ident,type 
						   FROM gluser '.$where;
				$result = $bd->consultar($query);
				$line = mysqli_fetch_array($result, MYSQL_NUM);
				$bd->liberar($result);
				$bd->cerrar();
				if(empty($line[1]) == false){
					//iniciando las variables de sesion
					$_SESSION['user'] = $user;
					$_SESSION['userName'] = $line[0];
					$_SESSION['userId'] = $line[1];
					$_SESSION['userType'] = $line[2];
					echo "inicio sesion";
					return $line[2];
				}
				/*echo $pass."      ";
				echo hash('ripemd160', $pass);*/
			}else{
				return 0;
			}
		}
	}
?>