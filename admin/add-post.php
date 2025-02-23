<?php 
// Start session at the very beginning of the file
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// Redirect if user is not logged in
if (empty($_SESSION['user'])) {
   
    echo "<script>window.location.href='login.php'</script>";
    exit(); // Make sure to call exit() to stop script execution after redirect
}

include('sidebar.php');

$conn = new mysqli('localhost', 'root', '', 'db_project');

$username = $_SESSION['user'];
$sql = "SELECT user_id FROM `tbl_user` WHERE `user_name`='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userid = $user['user_id'];  // Extract user ID
} else {
    $userid = '';  // Default if user not found
}
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add Sport News</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group"> 
                        <label>User ID</label>
                        <input type="text" name="u_id" id="N_id" value="<?php echo $userid; ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-select" name="type">
                            <option value="Sport">Sport</option>
                            <option value="Social">Social</option>
                            <option value="Entertainment">Entertainment</option>
                        </select>
                        <div class="form-group">
                        <label>category</label>
                        <select class="form-select" name="category">
                            <option value="National">National</option>
                            <option value="International">International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="profile" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                        <button type="button" class="btn btn-success" id="cancel">Cancel</button>
                        <!-- <button type="submit" class="btn btn-danger">Danger</button> -->
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#cancel').click(function(){
           window.location.href='view-post.php';   
        })
    })
</script>
<?php
include 'movFile.php';

if (isset($_POST['btnsubmit'])) {
    $u_id = $_POST['u_id'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $category =$_POST['category'];
    $image = MoveFile('profile');
    $description = $_POST['description'];

    $sql = "INSERT INTO `tbl__news`(`userID`, `title`, `thumbnail`, `post_type`, `category`, `description`)
            VALUES ('$u_id', '$title', '$image', '$type', '$category', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "News added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

