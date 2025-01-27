<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/style/theme.css">
</head>
<body>
    <div class="content-login">
        <form method="post">
            <label>Username</label>
            <input type="text" class="box" name="username">
            <label>Email</label>
            <input type="text" class="box" name="email">
            <label>Password</label>
            <input type="password" class="box" name="pass">
            <div class="wrap-btn">
                <a href="login.php" class="btn">Back To Login</a>&ensp;
                <input type="submit" class="btn" name="btn_register" value="SIGN UP">
            </div>
        </form>
    </div>
</body>
</html>
<?php 
$conn = new mysqli('localhost', 'root', '', 'db_project');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $script = "<script>";

    if (empty($name) || empty($email) || empty($pass)) {
        $script .= 'Swal.fire({
                    title: "Check your information",
                    text: "Field not found",
                    icon: "error"
                    });';
    } else {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        $role = "user";
        
        // Checking if user or email already exists
        $check_smt = $conn->prepare("SELECT user_name, email FROM tbl_user WHERE user_name=? OR email=?");
        $check_smt->bind_param("ss", $name, $email);
        $check_smt->execute();
        
        // Get result and check rows
        $check_smt->store_result();
        if ($check_smt->num_rows > 0) {
            $script .= 'Swal.fire({
                title: "Account already exists",
                text: "An account with that username or email already exists",
                icon: "error"
                });';
        } else {
            // Insert new user
            $smt = $conn->prepare("INSERT INTO tbl_user (user_name, email, password, role) VALUES (?, ?, ?, ?)");
            $smt->bind_param("ssss", $name, $email, $hashedPassword, $role);
            if ($smt->execute()) {
                $script .= 'Swal.fire({
                    title: "Account Created",
                    text: "Account created successfully",
                    icon: "success"
                    });';
            } else {
                $script .= 'Swal.fire({
                    title: "Account Creation Failed",
                    text: "Could not create account",
                    icon: "error"
                    });';
            }
            $smt->close();
        }
        $check_smt->close();
    }
    $script .= "</script>";
    echo $script; // Inject the JavaScript at the end
}

?>
