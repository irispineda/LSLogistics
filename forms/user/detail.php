<?php
	require "../../lib/bd.php";
	require "../../lib/util.php";
	require "user.php";
	
	//encabezado de tabla
	$print="<html><head></head><body><table>
					<tr>
						<th>Username</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Type</th>
					</tr>";
	
	//variables de consulta
	$user=$_GET["user"];
	$name=$_GET["name"];
	$email=$_GET["email"];
	$phone=$_GET["phone"];
	$type=$_GET["type"];
	$npag=$_GET["npag"];
	
	//bandera
	$hay=true;
	
	//utilidades
	$util= new util();
	$user1= new user();
	
	//consulta para obtener los datos
	$bd = new bd();
	$bd->conectar();
	
	$where=$bd->armaWhere(true,array("username"=>array($user,"LIKE"),
									 "name"=>array($name,"LIKE"),
									 "email"=>array($email,"LIKE"),
									 "phone"=>array($phone,"LIKE"),
									 "type"=>array($type,"=")));
	
	//paginacion
	$query = ' SELECT username,name,email,phone,type,ident 
			   FROM gluser '.$where.'
			   ORDER BY username';//como hacer que se ordene en base a una columna dada! paginacion!
	$result = $bd->consultar($query);
	$nreg = mysqli_num_rows($result);
	$bd->liberar($result);
	$tpag = ceil($nreg/$util->registrosPorPagina());
	$ireg = ($npag - 1) * $util->registrosPorPagina();
	
	$query = ' SELECT username,name,email,phone,type,ident,estate 
			   FROM gluser '.$where.'
			   ORDER BY username 
			   LIMIT '.$ireg.','.$util->registrosPorPagina();//como hacer que se ordene en base a una columna dada! paginacion!
	$result = $bd->consultar($query);
	
	while ($line = mysqli_fetch_array($result, MYSQL_NUM)) {
		$hay=false;
		$enlace="";
		
		switch($line[6]){
			case 0:
				$enlace='<a href="#" onclick="borrar('.$line[5].');"><img id="iconos" alt="Delete" class="icondel" /> </a>';
				break;
			case 1:
				$enlace='<a href="#" onclick="baja('.$line[5].');"><img id="iconos" alt="Deactivate" class="iconbaja" /> </a>';
				break;
			case 2:
				$enlace='<a href="#" onclick="alta('.$line[5].');"><img id="iconos" alt="Activate" class="iconalta" /> </a>';
				break;
		}
		
		$print .= "<tr>
					<td>$enlace <a href='edit.php?ident=$line[5]' id='edit' >$line[0]</a></td>
					<td>$line[1]</td>
					<td>$line[2]</td>
					<td>$line[3]</td>
					<td>".$user1->getType($line[4])."</td>
				</tr>";
	}
	$bd->liberar($result);
	$bd->cerrar();
	
	if ($hay){
		$print .= "<tr><td colspan=5><center>NO EXISTE INFORMACION 123</center></td></tr>";
	}else{
		$print .= "<tr><td colspan=5>";
		if($tpag > 1){
			for($i=1;$i<=$tpag;$i++){
				if($i == $npag){
					$print .= $npag." ";
				}else{
					//$print .= '<a href=detail.php?npag='.$i.'&user='.$user.'&name='.$name.'&email='.$email.'&phone='.$phone.'&type='.$type.'>'.$i.'</a> ';
					$print .= '<a href="#" onclick="cargarDetalle('.$i.');" >'.$i.'</a> ';
					
				}
			}
		}
		$print .= "</td></tr>";
	}
	$print .= '</table></body></html>';
	
	echo $print;
?>