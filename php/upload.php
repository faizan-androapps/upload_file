<?php
//   $file_name =  $_FILES['file']['name'];
//   $tmp_name = $_FILES['file']['tmp_name'];
//   $file_up_name = time().$file_name;
//   move_uploaded_file($tmp_name, "files/".$file_up_name);
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];
        
        $uploadDirectory = "uploads/"; // Change this to your desired upload directory
        // print_r($uploadDirectory);
        // echo 'i m here';
        $fileName = $file["name"];
        $filePath = $uploadDirectory . $fileName;
        
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            echo "File uploaded successfully.".$fileName;
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>