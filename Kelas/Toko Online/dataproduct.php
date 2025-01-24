<!-- <?php
class Product {
    private $conn;
    private $table = "product";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($name, $description, $price, $stock, $image) {
        // Prepare the SQL query
        $query = "INSERT INTO " . $this->table . " (namabarang, deskripsi, harga, stok, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bind_param("ssdss", $name, $description, $price, $stock, $image);
        
        // // Execute and return result
        // return $stmt->execute();
    }

    public function readAll() {
        // Select all products
        $query = "SELECT * FROM " . $this->table;
        return $this->conn->query($query);
    }

    public function readOne($id) {
        // Select a single product by ID
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function update($id, $name, $description, $price, $stock, $imagePath) {
        // Update product details
        $query = "UPDATE " . $this->table . " SET namabarang = ?, deskripsi = ?, harga = ?, stok = ?, gambar = ? WHERE id = ?";
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bind_param("ssdssi", $name, $description, $price, $stock, $imagePath, $id);
        
        // Execute and return result
        return $stmt->execute();
    }

    public function delete($id) {
        // Delete a product by ID
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        // Execute and return result
        return $stmt->execute();
    }
}
?> -->
