<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$marca = $_POST['marca'];	
	$valor =$res['valor'];
	$peso = $res['peso'];
	
	
	if(empty($name) || empty($qty)) {
				
		if(empty($name)) {
			echo "<font color='red'>Campo nome está vazio.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Campo Quantidade está vazio.</font><br/>";
		}
		
	} else {	
	
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', marca='$marca' WHERE id=$id");
		
		header("Location: view.php");
	}
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$qty = $res['qty'];
	$marca = $res['marca'];
	$valor =$res['valor'];
	$peso = $res['peso'];
}
?>
<html>
<head>	
	<title>Editar Dados</title>
</head>

<body>
	<a href="index.php">Principal</a> | <a href="view.php">Visualizar Produtos</a> | <a href="logout.php">Encerrar Sessão</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		
		<tr>
		    <!-- aqui tu da o echo no id para exibir na pagina -->
		    <div id="codigo">Codigo:          <?php echo $id ?></div>
		    
	    </tr>
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Quantidade</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Marca</td>
				<td><input type="text" name="marca" value="<?php echo $marca;?>"></td>
			</tr>
			<tr><tr> 
				<td>Valor</td>
				<td><input type="text" name="marca" value="<?php echo $valor;?>"></td>
			</tr>
			<tr><tr> 
				<td>Peso</td>
				<td><input type="text" name="marca" value="<?php echo $peso;?>"></td>
			</tr>
			<tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
