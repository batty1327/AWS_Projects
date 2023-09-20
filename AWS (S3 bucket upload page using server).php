1) Create a directory named "uploads" in the HTML folder.
   sudo mkdir uploads

2) Assign write permissions to the "uploads" directory.
   sudo chmod -R 777 uploads

3) Create a bucket in Amazon S3 with ACL-enabled settings. Remove any block-all settings on the bucket (i.e., make it public-read).

4) Create a file named "fileadd.html" in the HTML folder.

5) Add the following HTML code to the "fileadd.html" file:
<!DOCTYPE html>
<html>
    <body>      
        <form action="ups3.php" method="post" enctype="multipart/form-data">
            Select an image to upload:
            <input type="file" name="anyfile" id="anyfile">
            <input type="submit" value="Upload Image" name="submit">
        </form>       
    </body>
</html>

6) Run the following commands step by step in the HTML folder:
   sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
   sudo php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
   sudo php composer-setup.php
   sudo php -r "unlink('composer-setup.php');"
   sudo php composer.phar require aws/aws-sdk-php
   # Note: If you encounter any errors, you can move composer.phar to /usr/local/bin/composer with this command.

7) Create a file named "ups3.php" in the HTML folder.

8) Add the following PHP code to the "ups3.php" file:
<?php
// Include the AWS SDK autoload file to load required classes
require 'vendor/autoload.php';

// Import the S3Client class from the AWS SDK
use Aws\S3\S3Client;

// Instantiate an Amazon S3 client.
$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'ap-south-1',
    'credentials' => [
        'key'    => '***********',     // Add your access key here
        'secret' => '**************'  // Add your secret key here
    ]
]);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0) {
        // Define an array of allowed file extensions and their MIME types
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        
        // Get information about the uploaded file
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
        
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
        // Validate type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("uploads/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                // Move the uploaded file to a local directory
                if (move_uploaded_file($_FILES["anyfile"]["tmp_name"], "uploads/" . $filename)) {
                    $bucket = '*********'; // Add your bucket name here
                    $file_Path = __DIR__ . '/uploads/' . $filename;
                    $key = basename($file_Path);
                    try {
                        // Upload the file to Amazon S3
                        $result = $s3Client->putObject([
                            'Bucket' => $bucket,
                            'Key'    => $key,
                            'Body'   => fopen($file_Path, 'r'),
                            'ACL'    => 'public-read', // make file 'public'
                        ]);
                        // Display the URL of the uploaded image
                        echo "Image uploaded successfully. Image path is: " . $result->get('ObjectURL');
                    } catch (Aws\S3\Exception\S3Exception $e) {
                        echo "There was an error uploading the file.\n";
                        echo $e->getMessage();
                    }
                    echo "Your file was uploaded successfully.";
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["anyfile"]["error"];
    }
}
?>

9) Replace all *** values with your values.
   get Access Key and secret key from your account's Security Credentials.
   get bucket name from S3. (Make sure bucket is created with ACL-enabled Settings)

10) Now open below URL in browser
    http://your IP address/fileadd.html
    now click on "browse" button and select any one image and click on "upload"

11) Now it must show image uploaded successfully and also need to show you S3 URL for your image

12) Go to uploads folder in html folder and check that image also uploaded here

