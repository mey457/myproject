<?php 
ob_start();
include('sidebar.php');
include'movFile.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $conn=new mysqli('localhost','root','','db_project');
    $sql = "SELECT * FROM `tbl__news` WHERE `id` = '$id'";
    $result=$conn->query($sql);
    $image='';
    while($row=$result->fetch_assoc()){
        $image=$row['thumbnail'];
        $title=$row['title'];
        $type=$row['post_type'];
        $category=$row['category'];
        $description=$row['description'];
    }
}
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Edit Sport News</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <!-- <div class="form-group"> 
                        <label>User ID</label>
                        <input type="text" name="u_id" id="N_id" value="<?php echo $userid; ?>" readonly class="form-control">
                    </div> -->
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-select" name="type">
                            <option value="Sport" <?php if ($type == "Sport") echo "selected"; ?>>Sport</option>
                            <option value="Social" <?php if ($type == "Social") echo "selected"; ?>>Social</option>
                            <option value="Entertainment" <?php if ($type == "Entertainment") echo "selected"; ?>>Entertainment</option>
                        </select>
                        <div class="form-group">
                        <label>category</label>
                        <select class="form-select" name="category">
                            <option value="National" <?php if ($category == "National") echo "selected"; ?>>National</option>
                            <option value="International" <?php if ($category == "International") echo "selected"; ?>>International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="profile" class="form-control">
                        <img src="./assets/image/<?php $image ?>" alt="">
                        <input type="text" name="hide_img" id="" value="<?php echo $image ?>">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" value="<?php echo $description; ?>" name="description" id="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                        <button type="submit" class="btn btn-danger">Danger</button>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
<?php 
date_default_timezone_set('Asia/Phnom_penh');
$update=date('ymdhis');
if(isset($_POST['btnsubmit'])){
    $profile=MoveFile('profile');
    $title=$_POST['title'];
    $type=$_POST['type'];
    $category=$_POST['category'];
    $description=$_POST['description'];
    if(empty($profile)){
        $hide_img=$_POST['hide_img'];
        $sql="UPDATE `tbl__news` SET `title`='$title',`thumbnail`='$profile',`post_type`='$type',`category`='$category',`description`='$description',`update_at`='$update' WHERE `id`='$id'";
        $result=$conn->query($sql);
    }else{
        $sql="UPDATE `tbl__news` SET `title`='$title',`thumbnail`='$profile',`post_type`='$type',`category`='$category',`description`='$description',`update_at`='$update' WHERE `id`='$id'";
        $result=$conn->query($sql); 
    }
    
    echo "<script>window.location.href='view-post.php'</script>";
}

?>


