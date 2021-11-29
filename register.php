<html>
<head>
	<title>Registrar novo Usuário</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="script.js"></script>
</head>

<body>
<br><br><br><br>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Todos os campos devem estar preenhidos! Verifique novamente.";
		echo "<br/><br><br>";
		echo "<a href='register.php'>Voltar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Não foi possível efetuar essa consulta.");
			
		echo "Usuário Registrado com Sucesso<br><br>";
		echo "<br/>";
		echo "<a href='login.php'>Entrar</a>";
	}
} else {
?>
	<p><font size="+2">Registrar Novo Usuário</font></p>
	<form name="form1" method="post" action="">
		<table width="25%" border="0" align='center'>
			<tr> 
				<td width="10%">Nome</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Usuário</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Senha</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Registrar"></td>
			</tr><br>
		</table><br><br>
	</form><a href="index.php">Voltar</a> <br><br><br>
<?php
}
?>
</body>
</html>