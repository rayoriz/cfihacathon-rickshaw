<?php
$type=$_POST["type"];
$lat=$_POST["lat"];
$long=$_POST["lon"];
$x=  10;// manipulate lat 
$y=   10;// manipulate lon
include("config.php");
//mysql_connect(server,username,password);
//mysql_select_db(db);
$query;
if($type==0)
{
$s=mysql_query("select * from `users` where `id`='".$_POST['id']."'");
$r=mysql_fetch_assoc($s);

	$query="INSERT INTO `user_data`(`id`,`phn`,`lat`,`long`,`x`,`y`,`rate`) VALUES ('".$_POST['id']."','".$r['phn']."','".$lat."','".$long."','".$x."','".$y."','".$r['rate']."');";
	echo "connection made ! location set";
}

else if($type==1)
{
	$x=20;
	$query="UPDATE `user_data` set `x`='".$x."',`y`='".$y."' , `lat`='".$lat."',`long`='".$long."' WHERE `id`='".$_POST['id']."';";
	echo "updated location";
}

else 
{
	$query="DELETE FROM `user_data` WHERE `id`='".$_POST['id']."'";
 echo "connection closed";
}

mysql_query($query);
mysql_close();

?>