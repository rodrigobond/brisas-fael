<?php session_start(); ?>

<html>
<head>
	<title>Entrar</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="script.js"></script>
</head>

<body>
<br><br><br><br><br>
<?php
include("connection.php");

if(isset($_POST['submit'])) // o que esta definido aqui deve ter o mesmo nome atribuido no name do input 
	{
	
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") { // aqui verifica se alguma das entradas esta vazia, caso esteja, cria o link para redirecionar para o login. Recarrega a pagina somente. 
		echo "Campo usuário ou nome estão vazios.";
		echo "<br/>";
		echo "<a href='login.php'>Voltar</a>"; 
		echo "<script>window.location.href='login.php';</script>"; // location.href faz a redirecao automatica para a pagina definida.

	} else { // caso as entradas estejam preenchidas faz uma requiscao para o banco de dados 
  		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')") 
		// o * quer dizer "tudo". selecionar tudo de login onde username = 'o que foi passado pra variavel'
					or die("Não foi possível efetuar a consulta.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username']; // aqui salva a sessao com o nome do usuario, sera checada toda vez que for mudar de pagina para assegurar que o login foi feito 
			$_SESSION['valid'] = $validuser; // aqui define a sessao com o nome de 'valid' mas poderia ser qualquer outro
			$_SESSION['name'] = $row['name']; // aqui define a sessao com o nome do usuario, para exibir o nome do usuario nas paginas 
			$_SESSION['id'] = $row['id']; // aqui define a sessao id para exibir os dados apenas do usuario logado no momento. Ao fazer o select no banco de dados, usa-se o id para selecionar apenas os dados pertinentes aquele usuario
		} else {
			echo "Usuário ou Senha Inválido<br><br>";
			echo "<br/>";
			echo "<a href='login.php'>Voltar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');	 // aqui caso a seção seja valida ele direciona para a pricipal index
		}
	}
} else {
?>
<!-- aqui comeca a parte do formulario para a validacao, que sera feita com o codigo acima --> 
	<p><font size="+2">Entrar</font></p>
	<form name="form1" method="post" action=""> 
		<table width="25%" border="0" align='center'>
			<tr> 
				<td>Usuário</td>
				<td><input type="text" name="username"></td> <!-- o name sempre tem ser igual aqui e no $_POST -->
			</tr>
			<tr> 
				<td>Senha</td>
				<td><input type="password" name="password"></td> 
			</tr>
			<tr> <br>
				<td>&nbsp;</td>
				<td><center><input type="submit" name="submit" value="Entrar" class="button"></center></td> 
			</tr>
		</table>
	</form><br>
	<a href="index.php">Voltar</a><br>
<?php
}
?>
</body>
</html> 