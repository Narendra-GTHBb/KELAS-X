<!-- <?php
session_start();

// Pastikan menyertakan file koneksi dan kelas Barang
require_once 'database.php';
require_once 'cartbarang.php';

// Inisialisasi database
$database = new Database();
$db = $database->connect();

// Buat instance Barang
$barang = new Barang($db);

// Ambil data barang dari database
$barangList = $barang->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../E-COMMERCE/bootstrap-5.3.3-dist_1/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Daftar Barang</title>
</head>
<body>
<div class="container mt-5">
    <h2 style="margin-top: 100px;">Daftar Barang</h2>
    <div class="row">
        <?php while ($row = $barangList->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['namabarang']; ?>" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['namabarang']; ?></h5>
                        <p class="card-text">Harga: Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?><br>
                        Stok: <?php echo $row['stok']; ?> unit</p>

                        <!-- Form for adding item to cart -->
                        <form action="cart.php" method="post">
                            <input type="hidden" name="action" value="add">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button  class="btn btn-secondary">Tambah ke Keranjang</button>
                        </form>

                        <a href="transaksi.php" class="btn btn-info">Beli</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <br>
   
</div>
</body>
</html> -->
