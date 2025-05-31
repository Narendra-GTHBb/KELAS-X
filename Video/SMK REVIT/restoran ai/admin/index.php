<?php

session_start();
require_once "../dbcontroller.php";
$db = new DB;

if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
if (isset($_GET['log'])) {
    session_destroy();
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <div class="sidebar-header">
                <a href="index.php" class="logo">Restoran SMK</a>
                <h3>Admin Panel</h3>
            </div>
            
            <div class="sidebar-user">
                <div class="user-info">
                    <span>Selamat datang,</span>
                    <a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser'] ?>" class="user-name"><?php echo $_SESSION['user']?></a>
                    <span class="user-level">Level: <?php echo $_SESSION['level'] ?></span>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <ul class="nav-menu">
                <?php  
                $level = $_SESSION['level'];
                switch($level){
                    case 'admin':
                       echo '
                       <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">Kategori</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">Menu</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">Pelanggan</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=order&m=select">Order</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=user&m=select">User</a></li>
                       ';
                       break;

                       case 'kasir':
                       echo '
                        <li class="nav-item"><a class="nav-link" href="?f=order&m=select">Order</a></li>
                       <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                       ';
                       break;

                       case 'koki':
                       echo '
                       <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">Order Detail</a></li>
                       ';
                       break;
                       default:
                            echo 'Tidak ada menu';
                       break;
                }
                ?>
                </ul>
            </nav>
            
            <div class="sidebar-footer">
                <a href="?log=logout" class="logout-btn">Logout</a>
            </div>
        </div>
        
        <div class="admin-content">
            <div class="content-header">
                <h2>Dashboard Admin</h2>
                <div class="header-actions">
                    <a href="../index.php" class="btn-secondary">Lihat Website</a>
                </div>
            </div>
            
            <div class="welcome-card">
                <h3>Selamat Datang di Panel Admin</h3>
                <p>Silahkan kelola data restoran dengan menu di samping.</p>
            </div>
            
            <div class="content-main">
                <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f=$_GET['f'];
                    $m=$_GET['m'];

                    $file = '../'.$f.'/'.$m.'.php';

                   require_once $file;
                }
                ?>
            </div>
            
            <div class="content-footer">
                <p>2024 - copyright@narendra</p>
            </div>
        </div>
    </div>
</body>
</html>