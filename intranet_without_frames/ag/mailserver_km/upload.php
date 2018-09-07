<?php
        include_once('phpfuncs.php');
        //store2db('rp is'.$_POST['rp'],'debugind.txt');
         $ho=getHostByName(getHostName());
         $port=':'.$_SERVER['SERVER_PORT'];
        $rpback=$_POST['rp'];
        $subback=$_POST['sub'];
        $texback=$_POST['textar'];
        store2db('user!@#$#v#'.current_user(),'tempconto.txt');
        store2db($texback,'tempconto.txt');

        $sid='inbox';

        if (isset($_REQUEST['sid']))
        $sid=$_REQUEST['sid'];

        $target_dir = "uploads/";

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
		       {
        /*
    	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    	if($check !== false) 
              {
        echo "File is an image - " . $check["mime"] . ".";
       	$uploadOk = 1;
    	       } 
    	else 
    	       {
        echo "File is not an image.";
        $uploadOk = 0;
    	       }
         */
		       }
        // Check if file already exists
        if (file_exists($target_file)) 
               {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        RedirectToURL("index.php?linn=http://$ho$port/mailserver_km/".$target_file."&sid=".$sid."&rp=".$rpback."&sub=".$subback);
               }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) 
            {
        echo "<br>Sorry, your file is too large.".$_FILES['fileToUpload']['size']." is the size";
        $uploadOk = 0;
            }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "pdf") 
            {
        echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
            }

        if ($uploadOk == 0) 
            {
        echo "<br>Sorry, your file was not uploaded.";
        RedirectToURL("index.php?linn=Error try again"."&sid=".$sid);

            } 
        else 
            {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                    {
        echo "The file ". $target_file. " has been uploaded. here is the link ";
        echo "<br>"."<a href='http://localhost/mailserver_km/testing/".$target_file."'>link</a>";
       
RedirectToURL("index.php?linn=http://$ho$port/mailserver_km/".$target_file."&sid=".$sid."&rp=".$rpback."&sub=".$subback);
                    } 
        else        {
        echo "Sorry, there was an error uploading your file.";
                    }
            }
?>