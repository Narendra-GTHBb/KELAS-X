<?php
require 'main.php';

// Initialize the database connection and create the $barang object
$database = new Database();
$db = $database->connect();
$barang = new Barang($db);

// Handle form submission
if (isset($_POST['submit'])) {
    $namaBarang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar = $_FILES['gambar']['name'];

    // Menangani upload gambar
    if ($gambar) {
        // Tentukan folder tujuan untuk menyimpan gambar
        $uploadDir = 'uploads/';
        $targetFile = $uploadDir . basename($gambar);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Cek apakah file yang di-upload adalah gambar
        $check = getimagesize($_FILES['gambar']['tmp_name']);
        if ($check !== false) {
            // Cek jika file gambar sudah ada
            if (file_exists($targetFile)) {
                echo "Sorry, file already exists.";
                $gambar = null; // Set gambar ke null jika sudah ada
            } else {
                // Cek ukuran file (misalnya max 5MB)
                if ($_FILES['gambar']['size'] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $gambar = null; // Set gambar ke null jika terlalu besar
                } else {
                    // Cek format file (misalnya hanya gambar jpg, jpeg, png)
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                        $gambar = null; // Set gambar ke null jika format tidak valid
                    } else {
                        // Coba memindahkan file ke folder tujuan
                        $newFileName = uniqid() . '.' . $imageFileType; // Mengganti nama file menjadi unik
                        $targetFile = $uploadDir . $newFileName;

                        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
                            // Gambar berhasil di-upload
                            $gambar = $newFileName;
                        } else {
                            // Jika upload gagal
                            echo "Sorry, there was an error uploading your file.";
                            $gambar = null;
                        }
                    }
                }
            }
        } else {
            echo "File is not an image.";
            $gambar = null; // Set gambar ke null jika bukan gambar
        }
    }

    // Simpan data barang ke database
    if ($gambar) {
        // If an image is uploaded, use the uploaded image
        $barang->create($namaBarang, $harga, $stok, $gambar);
    } else {
        // If no image was uploaded, use a default image or null
        $defaultImage = 'default.jpg'; // You can use any default image name here
        $barang->create($namaBarang, $harga, $stok, $defaultImage);
    }

    // Redirect ke halaman utama setelah berhasil menyimpan
    header("Location: main.php");
    exit(); // Pastikan untuk keluar setelah redirect
}
?>
