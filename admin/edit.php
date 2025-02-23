<?php 
ob_start();
    include('sidebar.php');
    include'movFile.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $conn=new mysqli('localhost','root','','db_project');
        $sql="SELECT `image` FROM `tbl_logo` WHERE id = '$id'";
        $result=$conn->query($sql);
        $image='';
        while($row=$result->fetch_assoc()){
            $image=$row['image'];
        }
    }
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Edit Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       
                                        <label>File</label>
                                        <input type="file" name="profile" class="form-control">
                                        <img src="./assets/image/<?php $image ?>" alt="">
                                        <input type="text" name="hide_img" id="" value="<?php $image ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  name="btnsubmit"  class="btn btn-success">Edit</button>
                                        <button type="submit" class="btn btn-danger">Danger</button>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
date_default_timezone_set('Asia/Phnom_penh');
$update=date('ymdhis');
if(isset($_POST['btnsubmit'])){
    $profile=MoveFile('profile');
    if(empty($profile)){
        $hide_img=$_POST['hide_img'];
        $sql="UPDATE `tbl_logo` SET `image`='$profile',`update_at`='$update' WHERE `id`='$id'";
        $result=$conn->query($sql);
    }else{
        $sql="UPDATE `tbl_logo` SET `image`='$profile',`update_at`='$update' WHERE `id`='$id'";
        $result=$conn->query($sql); 
    }
    echo '<script>window.location.href="viewLogo.php";</script>';
}

?>