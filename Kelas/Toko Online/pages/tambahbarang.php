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

// Initialize variables
$message = '';
$uploadDir = 'uploads/'; // Directory for uploaded images

// Create uploads directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Fetch existing products for the dropdown
$queryProducts = "SELECT id, namabarang FROM product"; // Ensure this matches your column names
$resultProducts = mysqli_query($koneksi, $queryProducts);

$products = [];
if ($resultProducts) {
    while ($row = mysqli_fetch_assoc($resultProducts)) {
        $products[] = ['id' => $row['id'], 'namabarang' => $row['namabarang']];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['simpan'])) {
        $imagePath = null;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $filename = $_FILES['image']['name'];
            $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowed)) {
                $newFileName = uniqid() . '.' . $fileExt;
                $destination = $uploadDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imagePath = $newFileName; // Store only the filename for database
                }
            }
        }

        // Get form inputs
        $idproduct = isset($_POST['idproduct']) ? $_POST['idproduct'] : null; // Selected product ID
        $menuName = isset($_POST['menu']) ? $_POST['menu'] : null;
        $harga = isset($_POST['harga']) ? $_POST['harga'] : null;

        // Check if all required fields are filled
        if ($idproduct && $menuName && $harga) {
            // Prepare SQL statement for insertion into menuproduct table
            $sqlMenuProduct = "INSERT INTO menuproduct (idproduct, menu, gambar, harga) VALUES (?, ?, ?, ?)";
            $stmtMenuProduct = mysqli_prepare($koneksi, $sqlMenuProduct); // Prepare statement

            // Ensure variables are defined before binding
            if ($stmtMenuProduct) {
                // Convert values to variables
                $id_product = intval($idproduct);
                $menu_name = htmlspecialchars($menuName);
                $image_path = htmlspecialchars($imagePath);
                $price = floatval($harga);
                
                // Bind parameter using variables
                mysqli_stmt_bind_param($stmtMenuProduct, "issd", 
                    $id_product,
                    $menu_name,
                    $image_path,
                    $price
                );
            
                if (mysqli_stmt_execute($stmtMenuProduct)) {
                    $_SESSION['success_message'] = "Product added successfully!";
                    echo "<script>window.location.href='?menu=velg&category_id=2';</script>"; // Redirect to velg.php with category_id
                    exit();
                } else {
                    $message = 'Failed to create menu product.';
                }
            } else {
                $message = 'Failed to prepare statement.';
            }
        } else {
            echo "<script>alert('Please fill in all fields.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
    <style>
        /* Basic styles for layout */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        h2 {
            color: #444;
            margin-bottom: 20px;
        }

         .message {
             padding: 10px;
             margin-bottom: 20px;
             background-color: #d4edda;
             border: 1px solid #c3e6cb;
             border-radius: 4px;
             color: #155724;
         }

         .form-container {
             background-color: white;
             padding: 20px;
             border-radius: 8px;
             box-shadow: 0 2px 4px rgba(0,0,0,0.1);
             margin-bottom: 30px;
         }

         form {
             display: flex;
             flex-direction: column;
             gap: 15px;
         }

         input, textarea {
             padding: 8px;
             border: 1px solid #ddd;
             border-radius: 4px;
             font-size: 16px;
         }

         button {
             padding: 10px 15px;
             background-color: #007bff;
             color: white;
             border: none;
             border-radius: 4px;
             cursor: pointer;
             font-size: 16px;
         }

         button:hover {
             background-color: #0056b3;
         }

         .alert {
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 4px;
            }

            .alert-success {
                color: #155724;
                background-color: #d4edda;
                border-color: #c3e6cb;
            }
     </style>
</head>
<body>
    <div class="container">
       <h1>Product Management</h1>

       <?php if (isset($_SESSION['success_message'])): ?>
           <div class="alert-success">
               <?php 
               echo $_SESSION['success_message']; 
               unset($_SESSION['success_message']); // Clear message after displaying it
               ?>
           </div>
       <?php endif; ?>

       <!-- Add Product Form -->
       <div class="form-container">
          <h2>Add New Menu Product</h2>
          <form method="POST" enctype="multipart/form-data">
              <label for="idproduct">Select Category:</label>
              <select name="idproduct" id="idproduct" required>
                  <?php foreach ($products as $product): ?>
                      <option value="<?php echo htmlspecialchars($product['id']); ?>">
                          <?php echo htmlspecialchars($product['namabarang']); ?>
                      </option>
                  <?php endforeach; ?>
              </select>

              <input type="text" name="menu" placeholder="Menu Name" required>
              <input type="number" name="harga" placeholder="Price" step="0.01" required>

              <div class="image-upload">
                  <label for="image">Product Image:</label>
                  <input type="file" name="image" id="image" accept="image/*">
              </div>

              <button type="submit" name="simpan">Add Menu Product</button>
          </form>
      </div>

      <!-- Additional content can go here -->

    </div>

</body>
</html>
