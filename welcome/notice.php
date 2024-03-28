<title>Notices</title>
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

// Fetch files from the database
$sql = "SELECT * FROM files ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            a{
                color:#337ab7;
                text-decoration:none;
                color:black;
            }
            a:hover{
                color: blue;
            }
          </style>";
    echo  "<table>
    <tr><th>Title</th><th>Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        $filename = $row["title"];
        $date = $row["date"];
        echo "<tr><td>" . "<a href='uploads/$filename' download>$filename</a> " . "</td><td>" . $row["date"]. "</td></tr>";
        // echo "<a href='uploads/$filename' download>$filename</a> " . "$date<br><hr>";
    }
    echo "</table>";
} else {
    echo "No files uploaded";
}

$conn->close();
?>
