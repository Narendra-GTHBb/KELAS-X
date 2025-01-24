<!-- <?php
class Barang {
    private $conn;
    private $table = "product";

    public function __construct($db) {
        $this->conn = $db;
    }
    

    public function getItemById($id) {
        $query = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        return false; // Jika barang tidak ditemukan
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addToCart($itemId, $quantity) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId] += $quantity;
        } else {
            $_SESSION['cart'][$itemId] = $quantity;
        }
    }

    public function getCartItems() {
        $cartItems = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $itemId => $quantity) {
                $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $itemId);
                $stmt->execute();
                $item = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($item) {
                    $item['quantity'] = $quantity;
                    $cartItems[] = $item;
                }
            }
        }
        return $cartItems;
    }
}
?> -->
