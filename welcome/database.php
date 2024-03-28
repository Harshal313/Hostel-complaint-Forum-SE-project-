<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notice";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload handling
if(isset($_POST["submit"])) {
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];    
    $folder = "uploads/" . $filename;
    
    // Move uploaded file to uploads directory
    move_uploaded_file($tempname, $folder);
    $date = date("y/m/d");
    // Insert file information into the database
    $sql = "INSERT INTO files (title,date) VALUES ('$filename', CURDATE())";
    if ($conn->query($sql) === TRUE) {
        header("Location: addNotice.php");
        // echo "File uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
