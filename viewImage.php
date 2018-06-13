<?php

session_start();
require "./connect.inc.php";
require "./checksess.php";

require "top.php";
?>



    <style>
    
    li { float: left; margin-right: 50px; list-style: none; }
    li > div { border: solid 1px black; }
    
    /* 아래 세 줄이 중요한 스타일임 */
    div.aspect_1_1 { width: 80px; height: 80px; }
    div.aspect_4_3 { width: 100px; height: 75px; }
    div.aspect_4_5 { width: 80px; height: 100px; }
    
    .clearfix:after {
       content: " ";
       visibility: hidden;
       display: block;
       height: 0;
       clear: both;
    }
    .footer {
      width: 600px; text-align: center; margin-top: 5em;
    }
        
    </style>

<script>
window.onload = function() {
  var divs = document.querySelectorAll('li > div');
  for (var i = 0; i < divs.length; ++i) {
    var div = divs[i];
    var divAspect = div.offsetHeight / div.offsetWidth;
    div.style.overflow = 'hidden';
    
    var img = div.querySelector('img');
    var imgAspect = img.height / img.width;

    if (imgAspect <= divAspect) {
      // 이미지가 div보다 납작한 경우 세로를 div에 맞추고 가로는 잘라낸다
      var imgWidthActual = div.offsetHeight / imgAspect;
      var imgWidthToBe = div.offsetHeight / divAspect;
      var marginLeft = -Math.round((imgWidthActual - imgWidthToBe) / 2)
      img.style.cssText = 'width: auto; height: 100%; margin-left: '
                      + marginLeft + 'px;'
    } else {
      // 이미지가 div보다 길쭉한 경우 가로를 div에 맞추고 세로를 잘라낸다
      img.style.cssText = 'width: 100%; height: auto; margin-left: 0;';
    }
  }
  
  var btn = document.querySelector('#btnToggleOverflow');
  btn.onclick = function() {
    var val = divs[0].style.overflow == 'hidden' ? 'visible' : 'hidden';
    for (var i = 0; i < divs.length; ++i)
      divs[i].style.overflow = val;
  };
};

</script>
    

<?php

 $u_directory = CRC32($_SESSION[user_id]);  // 사용자 디렉토리 

 $dir    = 'uploads/'.$u_directory;   //  폴더 파일을 읽어온다
 $files1 = scandir($dir);
 $a=0;

 echo "Delete all Image & Upload Again 
        <form method='post' action='viewImage.php'>
            <input type=hidden value='1' name=delete>
            <button type=sbmit>Delete</button>
        </form>
         ";

 if($_POST[delete]) {
     
    echo "=== $_POST[delete]";
    $handle = opendir($dir);     
     while ($file = readdir($handle)) {
         echo "files = $dir.$file<br>";
         @unlink($dir."/".$file);
    }
    closedir($handle);
    echo ("<meta http-equiv='refresh' content='0'; url=viewImage.php>"); // 리프레시 

     
 }
 
 
/*
foreach($files1 as $value) 
    {
    $a++;
    if($a>2) 
        echo "<li><div class='aspect_4_3'><img src=uploads/".$value."></div>
        </li>"; 
    }
*/

echo "<table>";
 $count = 0;
 $fileorder = array();
 while($count<25) {
    $fileorder[$count] = $count+1;
    $count++;
 }
 
if(count($files1)<3) die ("No image files found<br><a href=upload.php>Go to upload Image files</a>");

unset($files1[0]); unset($files1[1]); // . 과 .. 제거
$files1 = array_values($files1);  // 빠진 인덱스 정렬

shuffle ( $fileorder );
 
$count = 0;

 for($a=0; $a<5; $a++)
 {
     echo "<tr>";
     for($b=0; $b<5; $b++)
     {
        $order = $fileorder[$count]-1;
        echo "<td width='150'><li><div class='aspect_4_3'><img src=uploads/".$u_directory."/".$files1[$order]."></div></li></td>"; 
        
        $count++;
     }
     echo "</tr>";
 }


echo "</table> <br><br> <b>Click and Edit Words</b> <br><br>";   // 이미지 테이블 종료

// 시드 워드 리스트 루틴 
$arr = file('english.txt');
shuffle ( $arr );

echo "<table >";

  $tcount=0;
 
 for($ta=0; $ta<5; $ta++)
 {
     echo "<tr>";
     for($tb=0;$tb<5; $tb++)
     {
       echo "<td width='138' style='border:solid 1px'><textarea cols=15 rows=4 style='border:0px; padding-left:10px; resize: none; overflow:hidden;'>";
//         echo "<td width='138' style='border:solid 1px'>";
         for($tc=0; $tc<4;$tc++)
         {
            echo "$arr[$tcount]";
            $tcount++;
         }  
         echo "</textarea></td>";
     }
     echo "</tr>";
 }
 echo  "</table>";

 require "copyright.php";
 ?>
