<?php
include 'movFile.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get data
function getaddData($id) {
    global $conn;
    $sql = "SELECT * FROM tbl__news WHERE id = '$id'"; // Get title & thumbnail
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) { // Check if query is successful
        while ($row = $result->fetch_assoc()) {
            
            echo '
            
                                <a href="">
                                    <div class="thumbnail">
                                        <img src="../admin/./assets/image/'.$row['thumbnail'].'" alt="">
                                    </div>
                                    <div class="detail">
                                        <h3 class="title">'.$row['title'].'</h3>
                                        <div class="date">'.$row['create_at'].'</div>
                                        <div class="description">
                                            '.$row['description'].'
                                        </div>
                                    </div>
                                </a>
                            ';
        }
    } else {
        echo "<p>No news available.</p>";
    }
}
?>