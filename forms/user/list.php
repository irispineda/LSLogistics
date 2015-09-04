<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>SCOEM</title>
	
	<link href="../../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../../js/jquery-ui-1.11.2/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="../../js/jquery-ui-1.11.2/external/jquery/jquery.js"></script>
	<script src="../../js/jquery-ui-1.11.2/jquery-ui.js"></script>
	
	<script type="text/javascript">
		function cargarDetalle(npag){
			var idUser=document.getElementById("user").value;
			var idName=document.getElementById("name").value;
			var idEmail=document.getElementById("email").value;
			var idPhone=document.getElementById("phone").value;
			var idType=document.getElementById("type").value;
			
			$("#content_detail").load('detail.php?npag='+npag+'&user='+idUser+'&name='+idName+'&email='+idEmail+'&phone='+idPhone+'&type='+idType);
		}
		
		function borrar(ident){
			alert("borrar ident "+ident);
		}
		
		function alta(ident){
			alert("alta del ident "+ident);
		}
		
		function baja(ident){
			alert("baja del ident "+ident);
		}
	</script>
</head>
<body>
	<div>
		<center><h2>REGISTERED USERS<hr/></h2></center>
		<fieldset>
			<legend>Search user</legend>
			Username: <input type="text" name="user" id="user" /><br />
			Name: <input type="text" name="name" id="name" /><br />
			Email: <input type="text" name="email" id="email" /><br />
			Phone: <input type="text" name="phone" id="phone" /><br />
			Type: <select name="type" id="type" >
					<option value="1">User</option>
					<option value="2">Biker</option>
					<option value="3">Order Admin</option>
				</select><br />
			<input name="search" id="search" type="button" value="Buscar" onclick="cargarDetalle(1);" />
		</fieldset>
		<br/>
		<div id="content_detail">
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
	</div>
</body>
<html>