<!-- <?php
session_start(); // Start session for using session variables

// Database connection settings
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "olshop";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add to cart function
function addToCart($productId, $quantity = 1) {
    global $koneksi;

    // Fetch product details
    $sql = "SELECT idmenuproduct, menu, gambar, harga 
            FROM menuproduct 
            WHERE idmenuproduct = ?";
            
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if (isset($_SESSION['cart'][$productId])) {
            // Update quantity if product exists in cart
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $_SESSION['cart'][$productId] = array(
                'id' => $productId,
                'name' => $row['menu'], // Store product name
                'price' => $row['harga'], // Store product price
                'image' => $row['gambar'], // Store product image
                'quantity' => $quantity
            );
        }
        return true;
    }
    return false;
}

// Update quantity function
function updateQuantity($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        } else {
            removeFromCart($productId);
        }
        return true;
    }
    return false;
}

// Remove from cart function
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        return true;
    }
    return false;
}

// Calculate total price
function getCartTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Handle cart actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $productId = $_POST['product_id'];
                $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
                addToCart($productId, $quantity);
                break;
                
            case 'update':
                $productId = $_POST['product_id'];
                $quantity = (int)$_POST['quantity'];
                updateQuantity($productId, $quantity);
                break;
                
            case 'remove':
                $productId = $_POST['product_id'];
                removeFromCart($productId);
                break;
        }
        
        // Redirect back to cart page to prevent form resubmission
        header('Location: cart.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .cart-item img {
            width: 100px; /* Fixed width for images */
            height: 100px; /* Fixed height for images */
            object-fit: cover; /* Maintain aspect ratio */
            margin-right: 20px; /* Space between image and text */
        }

        .item-details {
            flex-grow: 1; /* Allow this section to grow */
        }

        .quantity-control {
            display: flex; /* Flexbox for quantity control */
            align-items: center; /* Center items vertically */
            gap: 10px; /* Space between elements */
        }

        .quantity-control input {
            width: 60px; /* Fixed width for input */
            padding: 5px; /* Padding for input */
            text-align: center; /* Center text in input */
        }

        .update-btn, .remove-btn {
            padding: 5px 10px; /* Padding for buttons */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
        }

        .update-btn {
            background-color: #28a745; /* Green background */
            color: white; /* White text */
        }

        .remove-btn {
            background-color: #dc3545; /* Red background */
            color: white; /* White text */
        }

        .cart-total {
            margin-top: 20px; /* Space above total */
            text-align: right; /* Align total to the right */
            font-size: 1.2em; /* Larger font size for total */
            font-weight: bold; /* Bold text for total */
        }

        .empty-cart {
            text-align: center; /* Center text for empty cart message */
            padding: 20px; /* Padding for empty cart message */
            color: #666; /* Gray color for text */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        
        <?php if (empty($_SESSION['cart'])): ?>
             <div class="empty-cart">
                 <p>Your cart is empty</p>
                 <a href="index.php">Continue Shopping</a>
             </div>
         <?php else: ?>
             <?php foreach ($_SESSION['cart'] as $productId => $item): ?>
                 <div class="cart-item">
                     <img src="uploads/<?php echo htmlspecialchars($item['image']); ?>" 
                          alt="<?php echo htmlspecialchars($item['name']); ?>">
                     
                     <div class="item-details">
                         <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                         <p>Price: Rp <?php echo number_format($item['price'], 2, ',', '.'); ?></p>
                         
                         <form method="POST" class="quantity-control">
                             <input type="hidden" name="action" value="update">
                             <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                             <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1">
                             <button type="submit" class="update-btn">Update</button>
                         </form>
                         
                         <form method="POST" style="display:inline;">
                             <input type="hidden" name="action" value="remove">
                             <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                             <button type="submit" class="remove-btn">Remove</button>
                         </form>
                     </div>
                     
                     <div class="item-total">
                         Subtotal: Rp <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?>
                     </div>
                 </div>
             <?php endforeach; ?>
             
             <div class="cart-total">
                 Total: Rp <?php echo number_format(getCartTotal(), 2, ',', '.'); ?>
             </div>
             
             <div style="text-align:right;">
                 <a href="checkout.php" class="update-btn" style="text-decoration:none;">Proceed to Checkout</a>
             </div>
         <?php endif; ?>
     </div>
</body>
</html>
 -->
