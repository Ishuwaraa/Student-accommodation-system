<?php

// $target_dir = "uploads/";
$target_dir = "../../assets/images/";
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $totalFiles = count($_FILES['fileToUpload']['name']);
    $uploadedFiles = 0;

    for($i = 0; $i < $totalFiles; $i++) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);

        // Check if image file is a actual image or fake image
        if($check) {
            echo "File is an image - " . $check["mime"] . ".<br>";     //$check["mime"] = e.g. image/jpeg
            $uploadOk = 1;
        } else {
            echo "File is not an image. <br>";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
            echo "Sorry, your file is too large.<br>";  //500KB
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG & PNG files are allowed. <br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded. <br>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                $fileName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i]));
                echo "The file ". $fileName . " has been uploaded. <br>";
                $uploadedFiles++;
            } else {
                echo "Sorry, there was an error uploading your file. <br>";
            }
        }
    }

    echo "Total files uploaded: " . $uploadedFiles . "<br>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="testupload.php" method="post" enctype="multipart/form-data">
    Select image to upload:<br> 
    <input type="file" name="fileToUpload[]" id="fileToUpload"><br>
    <input type="file" name="fileToUpload[]" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>