<?php 
    include('sidebar.php');
    function getNew(){
        $conn=new mysqli('localhost','root','','db_project');
        $sql="SELECT *,`user_name` FROM `tbl__news` INNER JOIN `tbl_user` WHERE `userID`=`user_id`";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            echo'
                <tr>
                                            
                                            <td>'.$row['title'].'</td>
                                            <td>'.$row['post_type'].'</td>
                                            <td>'.$row['category'].'</td>
                                            <td><img width="60px" src="./assets/image/'.$row['thumbnail'].'"></td>
                                            <td>'.$row['create_at'].'</td>
                                            <td>'.$row['update_at'].'</td>
                                            <td>'.$row['user_name'].'</td>
                                            <td>
                                                <a href="editNew.php?id='.$row['id'].'" class="btn btn-primary">Edit</a>
                                                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                                            </td>
                                        </tr>
            ';
    
    }
}
if(isset($_POST['btndelet'])){
    $id = $_POST['remove_id'];
    $conn=new mysqli('localhost','root','','db_project');
    $sql="DELETE FROM `tbl__news` WHERE `id`=$id";
    $conn->query($sql);
    echo "<script>window.location.href='view-post.php'</script>";
}
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All Sport News</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table class="table" border="1px">
                                        <tr>
                                            <th>Title</th>
                                            <th>Post Type</th>
                                            <th>Categories</th>
                                            <th>Thumbnail</th>
                                            <th>Publish Date</th>
                                            <th>Update_Date</th>
                                            <th>Admin</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php 
                                        
                                         getNew();
                                         ?>
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
                                        </li>
                                    </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="text" class="value_remove" name="remove_id">
                                                        <button type="submit" name="btndelet" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
