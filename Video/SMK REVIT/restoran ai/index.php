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

function cart(){
    global $db;

    $cart = 0;



    foreach($_SESSION as $key => $value){
        if($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser'){
            $id = substr($key,1);
            
            $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

            $row=$db->getALL($sql);

            foreach ($row as $r) {
              $cart++;
            }

        }
    }
    return $cart;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran SMK | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo">
                <a href="index.php">Restoran SMK</a>
            </div>
            
            <div class="user-actions">
                <?php
                    if (isset($_SESSION['pelanggan'])) {
                        echo '<div class="cart-icon"><a href="?f=home&m=beli">Keranjang <span class="cart-count">'.cart().'</span></a></div>
                              <a href="?f=home&m=riwayat">Riwayat Pembelian</a>
                              <span>Halo, '.$_SESSION['pelanggan'].'</span>
                              <a href="?log=Logout">Logout</a>';
                    } else {
                        echo '<a href="?f=home&m=login">Login</a>
                              <a href="?f=home&m=daftar">Daftar</a>';
                    }
                ?>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mt-4">
            <div class="col-3 sidebar">
                <h3>Kategori Menu</h3>
                <?php if(!empty($row)) { ?>
                <ul class="category-list">
                <?php foreach($row as $r): ?>
                    <li><a href="?f=home&m=produk&id=<?php echo $r['idkategori'] ?>"><?= $r['kategori'] ?></a></li>
                <?php endforeach ?>
                </ul>
                <?php } ?>
            </div>

            <div class="col-9 content-area">
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
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Tentang Kami</h4>
                    <p>Restoran SMK menyajikan berbagai menu lezat dengan bahan-bahan berkualitas tinggi dan harga terjangkau.</p>
                </div>
                
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <p>Alamat: Jl. Pendidikan No. 123</p>
                    <p>Telepon: (021) 123-4567</p>
                    <p>Email: info@restoransmk.com</p>
                </div>
                
                <div class="footer-section">
                    <h4>Jam Buka</h4>
                    <p>Senin - Jumat: 08:00 - 22:00</p>
                    <p>Sabtu - Minggu: 10:00 - 23:00</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 Restoran SMK. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>