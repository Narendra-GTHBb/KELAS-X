<?php
// Koneksi ke database
class Database {
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $dbName = "dbgpt";
    private $connection;

    public function connect() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }

        return $this->connection;
    }
}

// Model Barang
class Barang {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM barang";
        $result = $this->db->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getById($id) {
        $sql = "SELECT * FROM barang WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function create($namaBarang, $harga, $stok, $gambar) {
        $sql = "INSERT INTO barang (nama_barang, harga, stok, gambar) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sdis", $namaBarang, $harga, $stok, $gambar);
        return $stmt->execute();
    }

    public function update($id, $namaBarang, $harga, $stok, $gambar) {
        $sql = "UPDATE barang SET nama_barang = ?, harga = ?, stok = ?, gambar = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sdisi", $namaBarang, $harga, $stok, $gambar, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM barang WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// Contoh penggunaan
$database = new Database();
$db = $database->connect();
$barang = new Barang($db);

// Contoh operasi CRUD
// CREATE
// $barang->create("Laptop", 15000000, 10, "laptop.jpg");

// READ
$dataBarang = $barang->getAll();
// print_r($dataBarang);

// UPDATE
$barang->update(1, "Laptop Gaming", 20000000, 8, "laptop_gaming.jpg");

// DELETE
$barang->delete(1);
?>

<!-- HTML dan CSS untuk Form CRUD -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQmH0v6GaMh8lOq4X3uPHic38DgFAiFtA9w5eab65e4v5Q6fPui3oEqVJ" crossorigin="anonymous">
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
            background-color:rgb(0, 176, 53);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }
        button:hover {
            background-color:rgb(4, 107, 35);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 20px;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
  <h1>CRUD Barang</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" required>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" required>

        <label for="gambar">Gambar</label>
        <input type="file" id="gambar" name="gambar">

        <button type="submit" name="submit">Simpan</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data barang akan ditampilkan di sini -->

<?php
    // Mengambil data barang dari database
    $barangList = $barang->getAll();

    // Looping untuk menampilkan setiap barang
    foreach ($barangList as $barang) {
        echo "<tr>";
        echo "<td>" . $barang['id'] . "</td>";
        echo "<td>" . $barang['nama_barang'] . "</td>";
        echo "<td>" . number_format($barang['harga'], 0, ',', '.') . "</td>";
        echo "<td>" . $barang['stok'] . "</td>";
        echo "<td><img src='uploads/" . $barang['gambar'] . "' width='150' alt='" . $barang['nama_barang'] . "'></td>";
        echo "<td><a href='edit.php?id=" . $barang['id'] . "'><button type='button' style='background-color: #0dcaf0 !important;'>Edit</button></a> | <a href='delete.php?id=" . $barang['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\"><button type='button' style='background-color: #dc3545 !important;'>Delete</button></a></td>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
</div>
</body>
</html>
