<?php
// Start session for using session variables

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

function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Initialize variables
$message = '';
$productDetails = null;

// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get and sanitize the ID

    // Prepare SQL statement to fetch product details from menuproduct
    $sql = "SELECT idmenuproduct, menu, gambar, harga, namabarang 
            FROM menuproduct  
            JOIN product ON idproduct =idproduct 
            WHERE idmenuproduct = ?";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $productDetails = mysqli_fetch_assoc($result);
        } else {
            $message = "Product not found.";
        }
    } else {
        $message = "Failed to prepare statement.";
    }
} else {
    $message = "No product ID specified.";
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    if (!isLoggedIn()) {
        // Save current URL for redirect after login
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
        echo "<script>window.location.href='?menu=login';</script>";;
        exit();
    }

    // Get product ID and quantity from form submission
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Initialize cart if not already done
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add or update item in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $productId) {
            $item['quantity'] += $quantity; // Update quantity if item already in cart
            $found = true;
            break;
        }
    }

    if (!$found) {
        // Add new item to cart
        $_SESSION['cart'][] = [
            'id' => $productId,
            'quantity' => $quantity,
        ];
    }

    $_SESSION['success_message'] = "Product added to cart successfully!";
    echo "<script>window.location.href='?menu=produkdetail&id= . $id';</script>"; // Redirect back to product detail page
    exit();
}

mysqli_close($koneksi); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
  
  <style>
      body {
          font-family: 'Roboto', sans-serif;
          line-height: 1.6;
          background-color: #f4f4f4;
          padding: 20px;
          margin: 0;
      }

      .container {
          max-width: 800px;
          margin: auto;
          background: white;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }

      h1 {
          text-align: center;
          color: #333;
          margin-bottom: 30px;
      }

      .message {
          padding: 15px;
          margin-bottom: 20px;
          border-radius: 4px;
          text-align: center;
      }

      .product-detail {
          margin-top: 20px;
          padding: 20px;
          border-radius: 8px;
          background: #fff;
      }

      .product-image {
          text-align: center;
          margin: 20px 0;
      }
      
      img {
          max-width: 100%;
          height: auto;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }

      .buy-button {
          display: inline-block;
          padding: 12px 24px;
          background-color: #28a745; /* Green */
          color: white;
          text-decoration: none;
          border-radius: 5px;
          font-weight: bold;
          transition: background-color 0.3s ease;
      }

      .buy-button:hover {
          background-color: #218838; /* Darker green */
      }
      
      .login-message {
          background-color: #f8d7da; /* Light red */
          border-color: #f5c6cb; /* Darker red */
          color: #721c24; /* Dark red */
          padding: 15px;
          border-radius: 5px;
          margin-top: 20px; 
      }
      
      .login-link {
         color:#007bff; 
         text-decoration:none; 
         font-weight:bold; 
     }
     
     .login-link:hover { 
         text-decoration:none; 
     }
     
     .user-status { 
         text-align:right; 
         padding-top :10px; 
     }
     
     .user-status a { 
         color:#007bff; 
         text-decoration:none; 
     }
     
     .user-status a:hover { 
         text-decoration:none; 
     }
     
     </style>
</head>
<body>

<div class="container">
   <div class="user-status">
       <?php if (isLoggedIn()): ?>
           <span>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
           <a href="logout.php" class="login-link">Logout</a>
       <?php else : ?>
           <a href="login.php" class="login-link">Login</a>
       <?php endif; ?>
   </div>

   <h1>Product Detail</h1>

   <?php if ($message): ?>
       <div class="message"><?php echo htmlspecialchars($message); ?></div>
   <?php endif; ?>

   <?php if ($productDetails): ?>
       <div class="product-detail">
           <h2><?php echo htmlspecialchars($productDetails['menu']); ?></h2>
           <div class="product-image">
               <img src="uploads/<?php echo htmlspecialchars($productDetails['gambar']); ?>" alt="<?php echo htmlspecialchars($productDetails['menu']); ?>">
           </div>
           <p><strong>Product Name:</strong> <?php echo htmlspecialchars($productDetails['namabarang']); ?></p>
           <p><strong>Price:</strong> Rp <?php echo number_format($productDetails['harga'], 2, ',', '.'); ?></p>

           <!-- Add to Cart Form -->
           <form method="POST" action="">
               <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productDetails['idmenuproduct']); ?>">
               <label for="quantity">Quantity:</label>
               <input type="number" name="quantity" id="quantity" value="1" min="1" required>
               <button type="submit" name="add_to_cart" class="buy-button">Add to Cart</button>
           </form>
       </div>
   <?php endif; ?>
</div>

</body>
</html>
