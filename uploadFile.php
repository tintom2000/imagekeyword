<?php


if(isset($_POST['submitImage']))

{

	for($i=0;$i<count($_FILES['file']['name']);$i++)
	{
		$uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];
		$folder="media/";

		move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], "$folder".$_FILES["uploadFile"]["name"][$i]);

	}





/*	
	for($i=0; $i<count($_FILES['file']['name']); $i++){
    $target_path = "uploads/";
    $ext = explode('.', basename( $_FILES['file']['name'][$i]));
    $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 

    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
        echo "The file has been uploaded successfully <br />";
    } else{
        echo "There was an error uploading the file, please try again! <br />";
    }
}  */
	
	

	exit();

}


?>