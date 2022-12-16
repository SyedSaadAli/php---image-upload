<?php
$connection = mysqli_connect("localhost","root","","imageupload");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	$ImageName = $_FILES['fileToUpload']['name'];
$fileElementName = 'fileToUpload';
$path = 'uploads/'; 
$location = $path . $_FILES['fileToUpload']['name']; 

move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $location); 
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

    $query = "INSERT INTO image (Image_name) VALUES ('$location')";
            $query_run = mysqli_query($connection, $query);

}
?>