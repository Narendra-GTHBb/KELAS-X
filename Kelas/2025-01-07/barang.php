<?php
class Barang {
    private $conn;
    private $table = "barang"; // Nama tabel di database

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $namaBarang, $harga, $stok, $gambar) {
        $query = "UPDATE " . $this->table . " 
                  SET nama_barang = :nama_barang, harga = :harga, stok = :stok, gambar = :gambar 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama_barang", $namaBarang);
        $stmt->bindParam(":harga", $harga);
        $stmt->bindParam(":stok", $stok);
        $stmt->bindParam(":gambar", $gambar);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
?>
