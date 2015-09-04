<?php 
	require "../../lib/bd.php";
	
	//encabezado de tabla
	$print="<table>
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
	
	//bandera
	$hay=true;
	
	//consulta para obtener los datos
	$bd = new bd();
	$bd->conectar();
	$query = ' SELECT username,name,email,phone,type,ident 
			   FROM gluser '.$where.$orderBy;
	$result = $bd->consultar($query);
	while ($line = mysqli_fetch_array($result, MYSQL_NUM)) {
		$hay=false;
		$print .= "<tr>
					<td>$line[0]</td>
					<td>$line[1]</td>
					<td>$line[2]</td>
					<td>$line[3]</td>
					<td>$line[4]</td>
				</tr>";
	}
	$bd->liberar($result);
	$bd->cerrar();
	
	if ($hay){
		$print .= "<tr><td colspan=5><center>NO EXISTE INFORMACION</center></td></tr>";
	}
	$print .= '</table>';
	
	echo $print;
?>





<?php
	require "../../lib/bd.php";
	require "../../lib/validate.php";
	require "../../lib/menu.php";
	
?>
<html>
<head>
	<script type="text/javascript">
		function cargarDetalle(){
			var idUsuario=document.getElementById("usuario").value;
			var idName=document.getElementById("name").value;
			var idEmail=document.getElementById("email").value;
			var idPhone=document.getElementById("phone").value;
			var idType=document.getElementById("type").value;
			
			if (idanio != -1 && idzona != -1){
				$("#detalle").load('detalle.php?anio='+idanio+'&zona='+idzona);
			}
		}
	</script>
</head>
<body>
	<form method="post">
		<center><h2>REGISTERED USERS<hr/></h2></center>
		<fieldset>
			<legend>Search user</legend>
			Username: <input type="text" name="usuario" id="usuario" onchange="cargarDetalle();" /><br />
			Name: <input type="text" name="name" id="name" onchange="cargarDetalle();" /><br />
			Email: <input type="text" name="email" id="email" onchange="cargarDetalle();" /><br />
			Phone: <input type="text" name="phone" id="phone" onchange="cargarDetalle();" /><br />
			Type: <select name="type" id="type" onchange="cargarDetalle();" >
					<option value="user">User</option>
					<option value="biker">Biker</option>
					<option value="admin">Administrator</option>
				</select><br />
		</fieldset>
		<br/>
		<div id="detail">
			<table>
				<tr>
					<th>Username</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Type</th>
				</tr>
				<tr><td colspan=5><center>NO EXISTE INFORMACION</center></td></tr>
			</table>
		</div>
	</form>		
</body>
<html>