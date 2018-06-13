<?


if($_POST[texto]) $texto = $_POST[texto];
else $texto="1234";

$crc32text=crc32($texto);

echo "crc32 = $crc32text<br>";
echo "POST = $_POST[texto]<br>";
echo "txto = $texto<br>";

?>


<form enctype="multipart/form-data" method="post" action="crc32test.php">
    <div class="row">
      <input type="text" name="texto">
      </div><br>
    <div class="row">
     <input id="upBoton" type="submit" value="Upload" />
    </div>
</form>