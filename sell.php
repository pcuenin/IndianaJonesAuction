<?php
include("config.php");
include("checklogin.php");


//INSERT INTO items (Price,Description,Name,Photo,SellerID,EndTime) VALUES("99",'Its the Cross of Coronado! Cortes gave it to him in 1521.','Cross of Coronado','Cross of Coronado', '1',CURDATE() + INTERVAL 1 Day);
// file upload below
$target_dir = "photos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$additem = "INSERT INTO items (Price,Description,Name,Photo,SellerID,EndTime) 
			VALUES('".$_POST['Price']."','".$_POST['Description']."','".$_POST['Name']."','".basename($_FILES["fileToUpload"]["name"])."',
			'".$_SESSION['UserNumID']."',CURDATE() + INTERVAL 1 Day);";
// echo $additem;
// add item to table
if(mysql_query($additem)===TRUE){
    echo "Congratulation you have added a new item for sale!";
    echo "Return to <a href=index2.php>Home</a>";
}else {
    echo "Error: adding item for sale:" . $additem . "<br>";
} 


?>