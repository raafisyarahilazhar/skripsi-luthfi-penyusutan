<?php
session_start();

require 'function.php';

if ( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // ambil data dari database
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    // cek username
    if ( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // Set Session
            $_SESSION["login"] = true;
            header("location: index.php");
            exit;
        } 
    } 
    // else {
    //     echo mysqli_error($conn);
    //     die;
    // }
    $error = true;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-4 mt-3 mx-auto mt-5">
                <div style="padding: 10px;" class="border border-dark rounded">
                    <h3>Login</h3>
                    <form action="" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                    <small>Belum punya akun? Silahkan <a href="register.php">register</a></small>
                    <?php if ( isset($error) ) : ?>
                        <p style="color: red; font-style: italic">username / password salah</p>
                    <?php endif ; ?>
                </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>