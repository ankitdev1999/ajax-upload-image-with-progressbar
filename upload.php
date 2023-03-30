<?php


include 'bunnycdn-storage.php';

$bunnyCDNStorage = new BunnyCDNStorage("file-xxx", "6eb5822f-4e8b-42be-ad3ea3559a81-550e-4e96", "");


$fileName = $_FILES["fileToUpload"]["name"];
$fileTemp = $_FILES["fileToUpload"]["tmp_name"];
$fileSize = $_FILES["fileToUpload"]["size"];
$fileType = $_FILES["fileToUpload"]["type"];
$ar = explode(".", $fileName);

$rand= substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456798"),0,5);
$imgname  =$rand.".".end($ar);


   $content = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

if ( move_uploaded_file($fileTemp, "upload/$imgname")){
    echo'ho gaya';
}else{
    echo'failed';

}

?>