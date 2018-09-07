<?php
function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
		{
    		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    		if($check !== false) {
        	echo "File is an image - " . $check["mime"] . ".";
       		 $uploadOk = 1;
    	} 
    	else 
    	{
        echo "File is not an image.";
        $uploadOk = 0;
    	}
		}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "<br>Sorry, your file is too large.".$_FILES['fileToUpload']['size']." is the size";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	
    $uploadOk = 0;
    RedirectToURL('file_upload.html');

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". $target_file. " has been uploaded. here is the link ";
        echo "<br>"."<a href='http://localhost/mailserver_km/testing/".$target_file."'>link</a>";
        RedirectToURL("test_17_7_18.php?lin=http://localhost/mailserver_km/testing/".$target_file);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>