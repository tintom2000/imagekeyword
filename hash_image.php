<?

require "./connect.inc.php";



$img_src = $_GET[img_src];
$pre_img_hash = $_GET[pre_img_hash];


 







if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
  $confirmar = "Invalid email";
} else {

$result=mysql_query("select * from admin where user='$_GET[cmail]'",$connection);
$total=mysql_num_rows($result);

//compruebo que los caracteres sean los permitidos 


if($total==0)
	{ 
	$confirmar="OK";
	}
else
	{
	$confirmar="Check Other";
	}
}  

echo $confirmar;

?>