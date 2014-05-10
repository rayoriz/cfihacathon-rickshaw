<?php

//$x=$_POST["x1"];
//$y=$_POST["y1"];
$x=1; $y=10;

include("config.php");

$query="select * from `user_data` where `x`='".$x."' and `y`='".$y."' ; " ;


$r=mysql_query($query);

if(mysql_num_rows($r))
{
while($s=mysql_fetch_assoc($r))
echo $s["phn"];
}
else
echo "there are no near by auto ";
?>

