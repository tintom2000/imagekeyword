<?

if($_POST[user_id]) $user_id=trim($_POST[user_id]);
elseif($_SESSION[user_id]) $user_id=$_SESSION[user_id];


if(!$user_id) echo("
<form method='POST' action='$_SERVER[PHP_SELF]'>
		  <table align=rigth cellpadding=0 cellspacing=2 bgcolor=#eee>
		  <tr>
			<td align=right style='padding-right:10px'>ID&nbsp; :<input type='email' name='user_id' size='10' style='border:solid 1px gray'></td>
			<td align=right style='padding-right:10px'>Password : <input type='password' name='clave' size='10' style='border:solid 1px gray'>&nbsp;&nbsp;<input type='submit' value='Login' name='B1' style='border:solid 1px gray'></td>
		    <td style='padding:5px' align=center><a href='account.php'>Create Account</a></td></tr>
		  </table>
</form>
");

 // $_SESSION = array() Destruir session.
else {
	if($_GET[logout]==1) { $_SESSION = array(); die("<script> location.href='index.php' </script>"); }

	$re_auth=mysql_query("select * from admin WHERE user='$user_id'");
	$row_auth=mysql_num_rows($re_auth);
	if($row_auth) $password_auth=mysql_result($re_auth,0,"pw");
	

	if($_POST[clave]) $_SESSION[user_pass]=crypt($_POST[clave], $password_auth);

//     crypt($_POST[clave], $password_auth) == $t_clave; 
	if ( $password_auth != $_SESSION[user_pass] || $password_auth==NULL) { 
			$_SESSION = array(); // destruir session
			echo(" <p>&nbsp;<br>
      Clave incorrecto.<br><br>
		  <a href=\"javascript:location.href='index.php'\">Reintentar</a> 
	  
  "); }

  	elseif(!$_SESSION[user_id]) { 
		$_SESSION[user_id]=trim($user_id); 
		$_SESSION[user_pass]=$_POST[clave];
		$_SESSION[user_level]=mysql_result($re_auth,0,"level");
		}

}

?>