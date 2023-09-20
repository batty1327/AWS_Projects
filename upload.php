<?php
// Define the target directory where the uploaded file will be stored
$target_dir = "uploads/";

// Construct the full path to the target file using the original file name
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Initialize a variable to track whether the file upload is OK (1 for OK, 0 for not OK)
$uploadOk = 1;

// Get the lowercase file extension of the target file
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the form was submitted (the "submit" button was clicked)
if (isset($_POST["submit"])) {
    // Check if the uploaded file is an actual image or a fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1; // Set uploadOk to 1, indicating that the file is an image
    } else {
        echo "File is not an image.";
        $uploadOk = 0; // Set uploadOk to 0, indicating that the file is not an image
    }
}

// Check if a file with the same name already exists in the target directory
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0; // Set uploadOk to 0, indicating that the file already exists
}

// Check the file size (limit it to 5MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0; // Set uploadOk to 0, indicating that the file size is too large
}

// Allow only certain file formats (JPG, JPEG, PNG, GIF)
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0; // Set uploadOk to 0, indicating that the file format is not allowed
}

// Check if $uploadOk is still set to 1 (no errors)
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // If everything is OK, attempt to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
