<?php

session_start();
$y=$_POST["phn"];
$r=8;
include("config.php");
mysql_query("INSERT INTO `users` (`phn`,`rate`) VALUES ('".$y."','".$r."')");
$id=mysql_query("SELECT * FROM `users`  order by `id` desc limit 0, 1");
$st=mysql_fetch_assoc($id);
$_SESSION["id"]=$st["id"];
echo $_SESSION["id"];

?>



