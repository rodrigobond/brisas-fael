<?php
session_start();
session_destroy();
echo "Sessão finalizada";
header("Location:index.php");
?>