<?php
require 'db_connect.php'; // Koneksi database
require 'Barang.php'; // Definisi kelas Barang

$database = new Database();
$db = $database->connect();
$barang = new Barang($db);

// Mengecek apakah ada parameter ID dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $barangData = $barang->getById($id);

    if (!$barangData) {
        die("Barang dengan ID tersebut tidak ditemukan.");
    }
} else {
    die("ID barang tidak diberikan.");
}

$message = ""; // Variabel untuk pesan keberhasilan atau error
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaBarang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_FILES['gambar']['name'];

    if ($gambar) {
        $uploadDir = 'uploads/';
        $newFileName = uniqid() . '-' . basename($gambar);
        $targetFile = $uploadDir . $newFileName;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            $gambar = $newFileName;
        } else {
            $message = "Gagal mengupload gambar. Perubahan tidak disimpan.";
            $gambar = $barangData['gambar'];
        }
    } else {
        $gambar = $barangData['gambar'];
    }

    if ($barang->update($id, $namaBarang, $harga, $stok, $gambar)) {
        header("Location: main.php"); 
        $barangData = $barang->getById($id); // Refresh data
    } else {
        $message = "Gagal mengupdate barang.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 50px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-size: 20px;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body> 
<div class="container">
    <h1>Edit Barang</h1>

    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="edit.php?id=<?= $barangData['id'] ?>" method="POST" enctype="multipart/form-data">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($barangData['nama_barang']) ?>" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($barangData['harga']) ?>" required>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($barangData['stok']) ?>" required>

        <label for="gambar">Gambar</label>
        <input type="file" id="gambar" name="gambar">
        <p>Gambar saat ini: <?= htmlspecialchars($barangData['gambar']) ?></p>

        <button type="submit">Simpan Perubahan</button>
    </form>
    </div>
</body>
</html>
