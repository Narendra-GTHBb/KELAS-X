<?php
session_start();
require_once "../dbcontroller.php";
$db = new DB;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Restoran</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="form-container fade-in" style="margin-top: 100px; max-width: 500px; margin-left: auto; margin-right: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);">
            <h3 style="text-align: center; margin-bottom: 25px;">Login Admin</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="login" value="Login" class="btn btn-primary" style="width: 100%;">
                </div>
                <p class="text-center" style="margin-top: 20px;"><a href="../index.php" class="text-primary">Kembali ke Halaman Utama</a></p>
            </form>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = hash('sha256',$_POST['password']);

    $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
    $count =$db->rowCOUNT($sql);
    if ($count == 0) {
        echo "<center><h3> Email atau Password salah</h3></center>";
    }else {
        $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
        $row=$db->getITEM($sql);

        $_SESSION['user'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['iduser'] = $row['iduser'];
        header("location: index.php");
    }
    
}

?>