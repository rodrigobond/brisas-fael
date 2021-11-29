<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Adicionar Novo Produto</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="script.js"></script>
</head>

<body>
<?php
//chama o arquivo de conexão
include_once("connection.php");

    if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$marca = $_POST['marca'];
	$valor = $_POST['valor'];
	$peso = $_POST['peso'];
	$loginId = $_SESSION['id'];
		
	// checa campos vazios
	if(empty($name) || empty($qty) || empty($marca) || empty($valor) || empty($peso)) {
				
		if(empty($name)) {
			echo "<font color='red'>Nome vazio. Preencha.</font><br/>";
		}
		
		if(empty($qty) or ($qty <= 0)) {
			echo "<font color='red'>Quantidade vazia ou negativa. Preencha.</font><br/>";
		}
		
		if(empty($marca)) {
			echo "<font color='red'>Marca vazia. Preencha.</font><br/>";
		}
		
		if(empty($valor)) {
			echo "<font color='red'>Preço vazio. Preencha.</font><br/>";
		}
		
		if(empty($peso)) {
			echo "<font color='red'>Peso vazio. Preencha.</font><br/>";
		}
		//retorna à pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
	} else { 
		// se nenhum campo estiver vazio 
			
		//insere no banco de dados	
		$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, marca, valor, peso, login_id) VALUES('$name','$qty', '$marca', '$valor', '$peso', '$loginId')");
		
		//mensagem de confirmação
		echo "<font color='green'><br><br>Produto Adicionado com Sucesso!<br><br>";
		echo "<br/><a href='view.php'>Ver Produtos Cadastrados</a>";
		echo "<br><br><br><br><a href='index.php'>Principal</a>";
	}
}
?>
</body>
</html>
