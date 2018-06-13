<?php

session_start();
require "./connect.inc.php";
require "./checksess.php";

require "top.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Files using normal form and PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.5, maximum-scale=1.5, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
            .a{
                display:none;
            }
        </style>    
</head>
<body>

<br><br>

<div><b>Fast Image Uploader</b></div>

<table width=100%><tr><td>

<?

 $u_directory = CRC32(trim($_SESSION[user_id]));  // 사용자 디렉토리 

 $dir    = 'uploads/'.$u_directory;   //  폴더 파일을 읽어온다
 $files1 = scandir($dir);
 if($files1) { $c_files = count($files1)-2; }
 else { $c_files = '0'; }

 if($c_files>=25) { 
     die ("you already have 25 image in your account. To upload new images, you have to delete images from your account. ");
 }
 elseif($c_files<25) {
     
     echo ("you already have <font id=filecount color=red>$c_files</font> image in your account. Keep going up to complete 25 images");
 }
 

 
?>


<form enctype="multipart/form-data" method="post" action="upload.php">
    <div class="row">
      <label for="fileToUpload" id="label1">Select Image to Upload (up to 25 Files)</label></br><br>
      <input type="file" name="filesToUpload[]" id="filesToUpload" multiple accept="image/*,.jpg,.gif,.png,.jpeg"/ onchange="previewImages()">
      <output id="filesInfo"></output>
    </div><br>
    <div class="row">
     <input id="upBoton" type="button" value="Upload" />
     <input id="resetBoton" type="reset" value="RESET" onClick="location.reload();"/>
    </div>
    <div class="row">
        
        
    </div>


<script>


    if (window.File && window.FileReader && window.FileList && window.Blob) {
        
        // document.getElementById('filesToUpload').onchange = function(){  // 엘레멘트 에 변경이 가해지면 실행
         document.getElementById('upBoton').onclick = function() { // upBoton Clink 하면 실행
            var files = document.getElementById('filesToUpload').files;
            
           
            // 이미지 크기변경후 업로드 resizeAndUpload()
          
                for(var i = 0; i < files.length; i++) { 
                    resizeAndUpload(files[i]);
                }
            
        };
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
     
    function resizeAndUpload(file) {
    var reader = new FileReader();
        reader.onloadend = function() {
     
        var tempImg = new Image();
        tempImg.src = reader.result;
        tempImg.onload = function() {
     
            var MAX_WIDTH = 100;
            var MAX_HEIGHT = 100;
            var tempW = tempImg.width;
            var tempH = tempImg.height;
            if (tempW > tempH) {
                if (tempW > MAX_WIDTH) {
                   tempH *= MAX_WIDTH / tempW;
                   tempW = MAX_WIDTH;
                }
            } else {
                if (tempH > MAX_HEIGHT) {
                   tempW *= MAX_HEIGHT / tempH;
                   tempH = MAX_HEIGHT;
                }
            }
     
            var canvas = document.createElement('canvas');
            canvas.width = tempW;
            canvas.height = tempH;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(this, 0, 0, tempW, tempH);
            var dataURL = canvas.toDataURL("image/jpeg");
     
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(ev){
                document.getElementById('filesInfo').innerHTML = 'Done!';
                document.getElementById('filecount').innerHTML = xhr.responseText;
                
                document.getElementById("imagen1").innerHTML = '';   // 이전 preview 이미지 제거
                

            };
     
            xhr.open('POST', 'uploadResized.php', true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var data = 'image=' + dataURL;
            xhr.send(data);
          }
     
       }
       reader.readAsDataURL(file);

       
    }
    

function previewImages() {          // 미리보기 생성


    var delPreview = document.getElementById("imagen1");  // 이전 미리보기 제거
    delPreview.innerHTML = '';

  var preview = document.querySelector('#imagen1');

  if (this.files) {  [].forEach.call(this.files, readAndPreview);  }

  function readAndPreview(file) {
    var reader = new FileReader();
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 50;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    }, false);
    
    reader.readAsDataURL(file);
  }
}
document.querySelector('#filesToUpload').addEventListener("change", previewImages, false);




</script>

</form>

Preview Image<br>

<div id="imagen1"></div>

</td></tr></table>
</body>
</html>


