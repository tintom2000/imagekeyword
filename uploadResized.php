<?php

session_start();
require "./connect.inc.php";
require "./checksess.php";

$u_directory = CRC32($_SESSION[user_id]);  // 사용자 디렉토리 지정 

if ($_POST) {
    define('UPLOAD_DIR', 'uploads/'.$u_directory.'/');
    
    
    $img = $_POST['image'];
    // echo $_POST['image'];


 $u_directory = CRC32($_SESSION[user_id]);  // 사용자 디렉토리 

 $dir    = 'uploads/'.$u_directory;   //  폴더 파일을 읽어온다
 $files1 = scandir($dir);
 $c_files = count($files1)-1;

    if(!is_dir(UPLOAD_DIR)) {   // 디렉토리가 없으면 생성.
	    mkdir(UPLOAD_DIR);
    }

    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR . uniqid() . '.jpg';   // 난수 파일명
    $success = file_put_contents($file, $data);
//    print $success ? $file : 'Unable to save the file.';
    if($success) echo "$c_files";    


    
} 

?>