<!-- Uploading notice as file only by Admin/Hostel Authority -->

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notice";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Fetch files from the database
    $sql = "SELECT * FROM files ORDER BY date DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $filename = $row["title"];
            $date = $row["date"];
            echo "<a href='uploads/$filename' download>$filename</a> ";
            echo "$date<br><hr>";
        }
    } else {
        echo "No files uploaded";
    }
    $conn->close();
?>

<main >
    
<form action="database.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"> <br>
        <button type="submit" name="submit">Upload</button>
    </form>
</form>
</main>
