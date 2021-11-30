<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//chama o arquivo de conexão
include_once("connection.php");

$id = $_SESSION['id'];
//lista produtos em ordem dscrescente da data de adição
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=".$id." ORDER BY id DESC");
?>
<!doctype html>
<html>
 <head>
	<title>Carrinho de Compras</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="script.js"></script>
  </head>

  <body>
  <BR><BR><a href="index.php">Principal</a> | <a href="add.html">Adicionar novo Produto</a> | <a href="view.php">Ver produtos</a> | <a href="logout.php">Encerrar Sessão</a>
	<br/><br/>
  <h2>Carrinho de Compras</h2>
  
	<table width='60%' border=0 align='center'>
		<tr bgcolor='#CCCCCC'>
			<td>Nome</td>
			<td>Quantidade</td>
			<td>Marca</td>
			<td>Valor</td>
			<td>Peso</td>
			<!--<td>Atualizar</td>-->
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td id='qt'>".$res['qty']."</td>";
			echo "<td>".$res['marca']."</td>";
			echo "<td>".$res['valor']."</td>";
			echo "<td>".$res['peso']."</td>";	
			echo "<input type='number' id='quantidadeProdutos'>Quantidade a ser adcionada: ";
			echo "</tr>";
			echo "<tr>";
			echo "<td><a id='finalizar' href=\"#\">Finalizar compra</a> |";
			echo "<td><a id='limpar' href=\"limpar.php?id=$res[id]\">Limpar carrinho</a> |";
			echo "</tr>";
			echo "<script>finalizar.addEventListener('click', function() { 
                            var qt_in = document.getElementById('quantidadeProdutos');
                            var qt_out = document.getElementById('qt');
                            qt_out.innerHTML -= qt_in.value; 
                            alert('Compra de ' + qt_in.value + ' produtos finalizada!' + '\\n' + 'Restam ' + qt_out.innerHTML + ' no estoque.')});
                            
                            
                            limpar.addEventListener('click', function() { 
                                var limpar_tabela = document.getElementsByTagName('tr')[1].remove();
                                alert('Carrinho Esvaziado!');
                                
                                         }); 
                             </script> ";
 echo "<img width='100px' height='100px' src='cart.png'>";
 echo  "<br><br><br><a href='index.php'>Voltar</a>";
  }
  ?>
  
  </table>
 </body>
</html>
