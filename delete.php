<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include("connection.php");


$id = $_GET['id'];


$result=mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");
echo "Produto removido com sucesso!";


header("Location:view.php");
?>
