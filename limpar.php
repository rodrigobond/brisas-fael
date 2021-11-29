
<?php
session_start();

include("connection.php");

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if ($_GET['action'] == 'limpar') {
        $id = $_GET['id'];

        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
        }
        header('location: view.php');
    ?>
    
<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include("connection.php");


$id = $_GET['id'];


$result=mysqli_query($mysqli, "DELETE FROM carrinho WHERE id=$id");
echo "Produto removido com sucesso!";


header("Location:view.php");
?>
