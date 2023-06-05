<?php
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["user_name"]);
$_SESSION["user_name"]=null;
$_SESSION["name"] = null; 
header("Location:index.php");
?>