<?php
// Koneksi ke database dan memanggil kelas Barang
include 'main.php'; // atau file koneksi dan kelas yang sesuai
$database = new Database();
$db = $database->connect();
$barang = new Barang($db);

// Mengecek apakah ada parameter ID dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data barang berdasarkan ID sebelum dihapus
    $barangData = $barang->getById($id);

    // Menghapus barang dari database
    if ($barang->delete($id)) {
        // Menghapus gambar jika ada (optional)
        if ($barangData['gambar']) {
            unlink("uploads/" . $barangData['gambar']);
        }
        // Redirect setelah berhasil menghapus
        header("Location: main.php");
    } else {
        echo "Gagal menghapus barang.";
    }
} else {
    // Jika tidak ada ID, redirect ke halaman barang
    header("Location: main.php");
    exit;
}
?>
