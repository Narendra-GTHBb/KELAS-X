<?php

session_start();
require_once "dbcontroller.php";
$db = new DB;

$sql = "SELECT * FROM tblkategori ORDER BY kategori";
$row =$db->getALL($sql);

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
    <title>Restoran SMK | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
</head>
<body>
    <div class="container">

    <div class="row">
        <div class="col-md-3 mt-4">
            <h2><a style="text-decoration: none; color:black;" href="index.php">Restoran SMK</a></h2>
        </div>

        <div class="col-md-9">

        <?php

            if (isset($_SESSION['pelanggan'])) {
                echo '<div class="float-right mt-4"><a style="text-decoration:none ;" href="?log=Logout">logout</a></div>
                      <div class="float-right mt-4 mr-4">Pelanggan : '.$_SESSION['pelanggan'].'</div>
                      ';
            }else {
                echo ' <div class="float-right mt-4 mr-4"><a style="text-decoration:none ;" href="?f=home&m=login">login</a></div>
                         <div class="float-right mt-4 mr-4"><a style="text-decoration:none;" href="?f=home&m=daftar">Daftar</a></div>
            ';
            }

        ?>


            
           
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-md-3">
        <h3>Kategori</h3>
        <hr>
        <?php if(!empty($row)) { ?>
        <ul class="nav flex-column">
        <?php foreach($row as $r): ?>
            <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id=<?php echo $r['idkategori'] ?>"><?= $r['kategori'] ?></a></li>
        <?php endforeach ?>
        </ul>
        <?php } ?>
        </div>

        <div class="col-md-9">
            <?php
                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f = $_GET['f'];
                    $m = $_GET['m'];

                    $file =$f.'/'.$m.'.php';

                    require_once $file;
                }else {
                    require_once "home/produk.php";
                }
            ?>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <p class="text-center">2024 - copyright@narendra</p>
        </div>
    </div>

    </div>
</body>
</html>