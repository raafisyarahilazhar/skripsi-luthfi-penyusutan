<?php 

require "function.php";
if ( isset($_POST["submit"]) ) {
    if ( register($_POST) > 0 ) {
        echo 
        "<script>
            alert('Registrasi Berhasil');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
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
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col col-4 mx-auto mt-5 border border-dark rounded" style="padding: 15px;">
                <h3>Register</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" required name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" required name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" required name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirmation Password</label>
                        <input class="form-control" type="password" required name="password2" id="password2">
                    </div>
                    <!-- <div class="form-group">
                        <input class="form-control" type="hidden" required name="role" id="role" value="user">
                    </div> -->
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </form>
                <small>
                    <a href="login.php">Login</a>
                </small>
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