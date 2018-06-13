<?
$connection=mysql_connect("localhost","imagekey_dbuser","Imagekey123") or die (" No puede estabilizar la coneccion con MySQL");
mysql_select_db("imagekey_maindb",$connection);

$PHPSELF=$_SERVER[PHP_SELF];
?>
