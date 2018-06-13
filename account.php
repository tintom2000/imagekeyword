<?

if($_POST[user_id]) $user_id=$_POST[user_id];

if(!$user_id) die ("

<form name=form1 method='POST' action='$_SERVER[PHP_SELF]'>
  <p>&nbsp;<br>
  </p>
  <div align='center'>
    <center>
    <table border='0' width='465' height='230' cellpadding=40 style='background: url(login-back.gif) repeat-x white;'>
	  <tr><td>
		  <table align=left>
		  <tr><td align=center colspan=2>Create Account</td></tr>
		  <tr>
			<td align=right><font size=2 face=verdana>email&nbsp; :</font></td>  
			<td >
			<input type=email size='20' id='u_id' name='user_id' style='border:solid 1px gray' value='su mail' Onfocus=\"this.value='';\"> <a id=verificador href=\"#\" class=gris>Check email</a>
		<input type=hidden name=check value=$check>
			</td>
		  </tr>
		  <tr>
			<td align=right><font size=2 face=verdana>Password : </font></td>
			<td><input type='password' name='clave' size='10' style='border:solid 1px gray'>&nbsp;&nbsp;<input type='submit' value='Registrar' name='B1' id='RegButton' disabled='disabled' style='border:solid 1px gray'></td>
		  </tr>
		  </table>
	  </td></tr>
    </table>
    </center>
  </div>
  
<script type=\"text/javascript\">
(function() {
  var httpRequest;
  var c_url = 'check_mail.php?cmail=';
  document.getElementById(\"verificador\").onclick = function() { makeRequest(c_url); };
  

  function makeRequest(url) {
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject(\"Msxml2.XMLHTTP\");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject(\"Microsoft.XMLHTTP\");
        } 
        catch (e) {}
      }
    }

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }

    httpRequest.onreadystatechange = alertContents;
    httpRequest.open('GET', url + document.getElementById(\"u_id\").value );
    httpRequest.send();
  }

  function alertContents() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        //alert (httpRequest.responseText);
            if(httpRequest.responseText == 'OK') { 
                document.getElementById('verificador').innerHTML = 'OK!'; 
                document.getElementById('RegButton').disabled = '';
            }
            else { document.getElementById('verificador').innerHTML = httpRequest.responseText; }
      } else {
        alert('There was a problem with the request.');
      }
    }
  }
})();
</script>


  <p><br>
  <br>
  <br>
  </p>
</form>
");

else
{
		require "./connect.inc.php";
		$result=mysql_query("select max(id) from admin",$connection);
		$id=mysql_result($result,0);
		$id++;

		$ref_pag="index.php";
		$sql_field="id,user,pw";

		$passw=crypt($_POST[clave]);
		
		$sql_var="'$id','$user_id','$passw'";
		mysql_query("insert into admin($sql_field) values($sql_var)", $connection);

		echo ("
<html>
<head>
<meta http-equiv='refresh' content='0;url=$ref_pag'>
<META NAME='Description' CONTENT=''>
</head>
</html>
		");

}

?>