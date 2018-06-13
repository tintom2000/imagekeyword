<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 
<?php
 
$arr = file('english.txt');
shuffle ( $arr );

 /*
 foreach($arr as $v){
     $a+=1;
      echo $a."=".$v;
 } */
 
 
echo "<body> 
<table border=1>";


  $count=0;
 
 for($a=0; $a<4; $a++)
 {
     echo "<tr>";
     for($b=0;$b<5; $b++)
     {
         echo "<td>";
         for($c=0; $c<4;$c++)
         {
            echo "$arr[$count]<br>";
            $count++;
         }  
         echo "</td>";
     }
     echo "</tr>";
 }
 ?>
 
 </table> 
  
 </body>
</html>
