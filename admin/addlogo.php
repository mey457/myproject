<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">                                    
                                        <label>File</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  name="btnsubmit" class="btn btn-primary">Submit</button>
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
include'movFile.php';
   if(isset($_POST['btnsubmit'])){
    $conn=new mysqli('localhost','root','','db_project');
     $image=MoveFile('profile');
     $sql="INSERT INTO `tbl_logo`( `image`) VALUES ('$image')";
     $resul=$conn->query($sql);
     if($resul){
        echo "<script>window.location.href=' ./viewlogo.php'</script>";
     }
   }
?>