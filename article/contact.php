<?php include('header.php'); ?>
    <div class="content contact">
        <section class="trending">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content-trending">
                            <div class="content-left">
                                CONTACT US
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="wrap-follow">
                            <h4 class="title">FOLLOW US</h4>
                            <ul>
                                <li>
                                   <img src="assets/icon/fb.png" width="40px"> <a href="">Facebook</a>
                                </li>
                                <li>
                                   <img src="assets/icon/yt.png" width="40px"> <a href="">Youtube</a>
                                </li>
                                <li>
                                   <img src="assets/icon/ig.jfif" width="40px"> <a href="">Instagram</a>
                                </li>
                                <li>
                                   <img src="assets/icon/telegram.png" width="40px"> <a href="">Telegram</a>
                                </li>
                                <li>
                                   <img src="assets/icon/gmail-1.png" width="40px"> <a href="">Email</a>
                                </li>
                                <li>
                                   <img src="assets/icon/tiktok.png" width="40px"> <a href="">Tok Tok</a>
                                </li>
                                <li>
                                   <img src="assets/icon/phone.jpg" width="40px"> <a href="">012 333 444 / 010 232 323</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="wrap-contact">
                            <h4 class="title">FEEDBACK TO US</h4>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="label">Username</div>
                                        <input type="text" class="box" name="name" placeholder="Username" required>
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Email</div>
                                        <input type="email" class="box" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Telephone</div>
                                        <input type="tel" name="telephone" class="box" placeholder="Telephone" required minlength="9" maxlength="10">
                                    </div>
                                    <div class="col-6">
                                        <div class="label">Address</div>
                                        <input type="text" name="address" class="box" placeholder="Address" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="label">Message</div>
                                        <textarea cols="30" name="message" rows="10" placeholder="Message Here" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="wrap-btn">
                                            <button type="submit" name="btn_message"><i class="fab fa-telegram-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include('footer.php'); ?>
<?php 
$conn = new mysqli('localhost', 'root', '', 'db_project');
if(isset($_POST['btn_message'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $address=$_POST['address'];
    $message=$_POST['message'];
    global $conn;
    $sql="INSERT INTO `btl_feedback`( `userName`, `email`, `phone`, `address`, `message`) 
    VALUES ('$username','$email','$telephone','$address','$message')";
    $resul=$conn->query($sql);
    if($resul){
        echo '<script>
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
            });
        
        </script>';
    }
}


?>