<?
require "top.php";

if(!$_POST[clave2]) 
{
echo ("  <br><br>
<form method='POST' action='$PHP_SELF'>
  <input type='hidden' name='user_id' value='$user_id'>
  <div align='center'>
    <center>
    <table border='0' width='465' height='200' cellpadding=40 bgcolor=#FFF3E8>
      <tr><td align=center> <h3>My account</h3> 
	  Chage your password.
		  <table align=center>
		   <tr>
			<td width='50%' align=right valign=middle><font size=2 face=verdana>id:</font></td>  
			<td width='50%' valign=middle>&nbsp;&nbsp;<b>$_SESSION[user_id]</b></td>
		  </tr>
		  <tr>
			<td width='50%' align=right><font size=2 face=verdana>old password:</font></td>  
			<td width='50%'><input type='password' name='clave1' size='10'></td>
		  </tr>
		  <tr>
			<td align=right><font size=2 face=verdana>new password: </font></td>
			<td><input type='password' name='clave2' size='10'>&nbsp;&nbsp;</td>
		  </tr>
		  <tr>
			<td align=right><font size=2 face=verdana>re-enter new password : </font></td>
			<td><input type='password' name='clave3' size='10'>&nbsp;&nbsp;<input type='submit' value='Send' name='B1' class=boton></td>
		  </tr>
		  </table>
	  </td></tr>
    </table>
    </center>
  </div>
</form>
<BR><BR>
 </td>
");
require "copyright.php";
}
else {
	$result_auth=mysql_query("select * from admin WHERE user='$_SESSION[user_id]'");
	$row_re_auth=mysql_num_rows($result_auth);
	if($row_auth) $password_db=mysql_result($result_auth,0,"pw");

	if($_POST[clave1]) $_SESSION[user_pass]=crypt($_POST[clave1], $password_db);

	if ( $password_db != $_SESSION[user_pass] || $password_db==NULL) { 
		die (" <BR><BR><BR><center> Old password is incorrect. <br> <a href=\"javascript:location.href='micuenta.php'\">Volver</a> </center><BR><BR><BR>		</TD>
	</TR>
	</TABLE>

	</td>
  </tr>
</table>
		<div id='cssmenu'>
		<ul>
		   <div align=center><font size=2>Copyright 2018 &copy;  design & develop by Coinblue. </font></div>
		 <ul>
	 </div>
</body>
</html>
"); }
	elseif($password_db==$_SESSION[user_pass] && $_POST[clave2]==$_POST[clave3]) { 
		$passw=crypt($_POST[clave2]);
		mysql_query("update admin set pw='$passw' where user='$_SESSION[user_id]'",$connection);
		$_SESSION[user_pass]=$passw;
		die (" <BR><BR><BR>
				<TABLE width=465 height=200 align=center valign=middle cellpadding=40 bgcolor=#FFF3E8>
				<TR>
					<TD align=center><h5>Your password is succesfully changed. </h5></TD>
				</TR>
				
				</TABLE>  <BR><BR><BR>
		   		</TD>
			</TR>
			</TABLE>
		 </td>
		  </tr>
		</table>
		<div id='cssmenu'>
		<ul>
		   <div align=center><font size=2>Copyright 2018 &copy;  design & develop by Coinblue. </font></div>
		 <ul>
	 </div>
		</body>
		</html>

		");
		}
		elseif($_POST[clave2]!=$_POST[clave3]) { 
		die (" <BR><BR><BR><center> The new password does not match.<br> <a href=\"javascript:location.href='micuenta.php'\">Go back</a> </center><BR><BR><BR>
				</TD>
			</TR>
			</TABLE>

		</td>
		  </tr>
		</table>
<div id='cssmenu'>
		<ul>
		   <div align=center><font size=2>Copyright 2018 &copy;  design & develop by Coinblue. </font></div>
		 <ul>
	 </div>
		</body>
		</html>"); }

}