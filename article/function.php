<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$conn=new mysqli('localhost','root','','db_project');
// Function to get data
function get_main_news() {
    global $conn;
    $sql = "SELECT * FROM tbl__news ORDER BY `id` DESC LIMIT 1";
 // Get title & thumbnail
    $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {   
            echo '
            <div class="col-8 content-left">
            <figure>
                    <a href="#">
                        <div class="thumbnail">
                            <img width="100%" height="500px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="News Image">
                            <div class="title">' .($row['title']) . '</div>
                        </div>
                    </a>
                </figure>
                 </div>';
        }
    }
    function get_sub_news(){
        global $conn;
    
        // Get the latest news ID
        $latest_sql = "SELECT id FROM tbl__news ORDER BY id DESC LIMIT 1";
        $latest_result = $conn->query($latest_sql);
    
        if ($latest_result->num_rows > 0) {
            $latest_row = $latest_result->fetch_assoc();
            $latest_id = $latest_row['id']; // Get the latest ID
    
            // Get the latest 2 news articles excluding the most recent one
            $sql = "SELECT * FROM tbl__news WHERE id != ? ORDER BY id DESC LIMIT 2";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $latest_id); // Bind the latest ID as an integer
            $stmt->execute();
            $result = $stmt->get_result();
    
            while ($row = $result->fetch_assoc()) {
                echo '
                 <div class="col-12">
                    <figure>
                        <a href="#">
                            <div class="thumbnail">
                                <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="News Image">
                                <div class="title">' .($row['title']) . '</div>
                            </div>
                        </a>
                    </figure>
                 </div>';
            }
        } else {
            echo "No news available.";
        }
    }
    function get_news_by_category_and_post_type($post_type,$category){
        global $conn;
        $sql="SELECT * FROM `tbl__news` WHERE post_type='$post_type' AND category='$category' ORDER BY id DESC LIMIT 6";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            echo '
            <div class="col-4">
                <figure>
                    <a href="">
                        <div class="thumbnail">
                            <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="">
                        </div>
                        <div class="detail">
                            <h3 class="title">'.$row['title'].'</h3>
                            <div class="date">'.$row['create_at'].'</div>
                            <div class="description">
                                '.$row['description'].'
                            </div>
                        </div>
                    </a>
                </figure>
            </div>
            ';
        }

    }
    function get_title(){
        global $conn;
        $sql = "SELECT title FROM tbl__news ORDER BY id DESC LIMIT 12";
        $result = $conn->query($sql);
       while( $row = $result->fetch_assoc()){
         echo '
         
          <i class="fas fa-angle-double-right"></i>
        <a href="">'.$row['title'].'</a> &ensp;
         ';
         
       }
        
    }
    function getData_news($post_type){
      global $conn;
      $sql = "SELECT * FROM tbl__news WHERE post_type='$post_type' ORDER BY id DESC LIMIT 3";
      $result = $conn->query($sql);
       while( $row = $result->fetch_assoc()){
          echo '
          
             <div class="col-4">
                    <figure>
                        <a href="#">
                            <div class="thumbnail">
                                <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="News Image">
                                <div class="title">' .$row['title'] . '</div>
                            </div>
                        </a>
                    </figure>
                     </div>'; 
       }
       

    }
       function get_logo(){
        global $conn;
        $sql = "SELECT * FROM tbl_logo ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo '
             <a href="index.php">
             <img width: 200px height=80px src="../admin/assets/image/'.$row['image'].'" alt="">
                </a>
             ';
        }
       }
       function get_logo_smail(){
        global $conn;
        $sql = "SELECT * FROM tbl_logo 
                WHERE id != (SELECT id FROM tbl_logo ORDER BY id DESC LIMIT 1) 
                ORDER BY id DESC LIMIT 3";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <li>
                    <a href="#"><img width="40px" height="40px" src="../admin/assets/image/'.$row['image'].'" alt="Logo"></a>
                </li>
                ';
            }
        }
    }
    function get_search(){
        global $conn;
        $search = $_GET['query'];
        $sql = "SELECT * FROM tbl__news WHERE post_type LIKE '%$search%' OR category LIKE '%$search%' LIMIT 6";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo '
            
             <div class="col-4">
                    <figure>
                        <a href="#">
                            <div class="thumbnail">
                                <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="News Image">
                                <div class="title">'.$row['title'].'</div>
                            </div>
                        </a>
                    </figure>
                     </div>'; 
       }
    }
    

    
?>


