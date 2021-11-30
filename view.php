<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//chama o arquivo de conexão
include_once("connection.php");

//lista produtos em ordem dscrescente da data de adição
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Página dos Produtos</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="script.js"></script>
</head>

<body>
	<br><br><a href="index.php">Principal</a> | <a href="add.html">Adicionar novo Produto no Estoque</a> <!--<a href='cart.php?id=<?php $_SESSION['id'] ?>'>Carrinho de compras</a> --> | <a href="logout.php">Encerrar Sessão</a>
	<br/><br/>
	<br><br>
	<table width='60%' border=0 align='center'>
		<tr bgcolor='#CCCCCC'>
			<td>Nome</td>
			<td>Quantidade</td>
			<td>Marca</td>
			<td>Valor</td>
			<td>Peso</td>
			<td>Atualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['marca']."</td>";
			echo "<td>".$res['valor']."</td>";
			echo "<td>".$res['peso']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Tem certeza que deseja excluir o Produto?')\">Apagar</a> | <a id='cart' href=\"cart.php?name=$res[name]&qty=$res[qty]&marca=$res[marca]&valor=$res[valor]&peso=$res[peso]&id=$res[id]\">Adicionar ao Carrinho</a></td>";		
			//echo "<a href=\"cart.php?id=$_SESSION['id']\">Carrinho de compras</a>";
			
		}
		?>
	</table>
	 <br><br><input type=button onClick="location='cart.php'" value='Ver Carrinho de Compras'><br>
</body>
</html>
