<? 
session_start();
require "./connect.inc.php";
?>
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> -->
<html>
<head><meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="style-key.css">

   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>ImageKeyword WEB</title>
</head>
<body>

<div class=wrap style='width:1100px;margin-left: auto; margin-right: auto;'>
	<div class=header>
		<IMG SRC="header.gif" WIDTH="1100" HEIGHT="50" BORDER="0" ALT=""><? require "./checksess.php";  ?>
	</div>		
	<div id='cssmenu'>
				<ul>
				   <li><a href='index.php'><span>Home</span></a></li>
				   <li><a href='help_eng.php'><span>Help</span></a></li>
				   <li><a href='upload.php'><span>Upload</span></a></li>
				   <li><a href='viewImage.php'><span>View</span></a></li>
				   <li><a href='micuenta.php'><span>Account</span></a></li>
				   <li class='last'><a href='<? $PHP_SELF ?>?logout=1'><span>Logout</span></a></li>
				</ul>
	</div>
<table>
  <tr>
	<td valign=top><font size='2px'>Donation :</td>
	<td><font size='2px'color=blue>ETH - 0xd2be8C1D59eb3aB6F0507bDc3f9c4260EA294a40<br>
	BTC - 15X8dC563VF8wxAqruvTk99mhYpkTpDFT8
	</td>
  </tr>
  </table>
 
	<div class=content style="padding:20px">
