<script language=javascript>
function final()
	{
	window.opener.document.form1.user_id.value='<? echo $_POST[user_id] ?>';
	window.opener.document.form1.check.value='1';
	window.close();
	} 
</script>

<?
require "./connect.inc.php";

if(($_GET[verificar]==1)&&($_POST[user_id]!=""))
{ 	
$result=mysql_query("select * from admin where user='$_POST[user_id]'",$connection);
$total=mysql_num_rows($result);

//compruebo que los caracteres sean los permitidos 
   $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.@"; 
   for ($i=0; $i<strlen($_POST[cliente]); $i++){ 
      if (strpos($permitidos, substr($_POST[cliente],$i,1))===false){ 
		$reintentar="<b>$_POST[cliente]</b> es un nombre de cliente incorrecto.<BR> Intente con otro nombre de cliente.";
      } 

   } 


if($total==0)
	{ 
	$confirmar="<b> $_POST[user_id]</b> est&aacute; disponible.<BR> <a href=\"javascript:final()\"><font color=red>Confirmar</font></a>";
	}
else
	{
	$confirmar="Email en uso.<BR> Intente con otra cuenta.";
	}
}
?>



<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<BODY>
<form name=form3 method=post action='verificar.php?verificar=1'>
<TABLE width=250 height=200 bgcolor=#eeeeee style="border:solid 1px silver" cellspacing=2 align=center valign=middle>
<TR><TD COLSPAN=2 align=center height=50>Ingrese una cuenta de correo<BR></TD></TR>
<TR>
	<TD align=right height=80><input type=text name=user_id size='10' value=<? echo $_POST[user_id] ?>></TD>
	<TD><INPUT TYPE="submit" value="verificar"></TD>
</TR>
<TR><TD COLSPAN=2 align=center><? if ($reintentar) { echo $reintentar; } 
															else { echo $confirmar; } ?></TD></TR>
</TABLE>
 </form>
<BR><BR>
</body>
</html>
