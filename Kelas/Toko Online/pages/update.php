<?php

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql = "SELECT * FROM menuproduct WHERE idmenuproduct=$id";

    $row=$database->getITEM($sql);
}



if (isset($_POST['simpan'])) {
    $namabarang = $_POST['namabarang'];
    $sql = "UPDATE product SET namabarang ='$namabarang' WHERE id=$id";
   
    $database->runSQL($sql);
    echo "<script>window.location.href='?menu=velg';</script>";
    exit;
}


?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
    <style>
        /* Basic styles for layout */
        @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

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

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse; 
         }

         th, td { 
           padding:12px; 
           text-align:left; 
           border-bottom:1px solid #ddd; 
         }
         
         th { 
           background-color:#f8f9fa; 
           font-weight:bold; 
         }
         
         tr:hover { 
           background-color:#f5f5f5; 
         }
    </style>
</head>
<body>
<div class="container">
        <h1>Update Management</h1>

        <!-- <?php if ($message): ?>
          <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?> -->

       Update Product Form
       <div class="form-container">
          <h2>Uodate Product</h2>
          <form method="POST">
              <input type="text" name="namabarang" value="<?php echo $row['namabarang'] ?>" required>
             
              <!-- <input type="number" name="harga" placeholder="Price" step="0.01" required>
              <input type="number" name="stok" placeholder="Stock" required>
              <div class="image-upload">
                  <label for="image">Product Image:</label>
                  <input type="file" name="image" id="image" accept="image/*">
              </div> -->
              <button type="submit" name="simpan" value="simpan">Update</button>
          </form>
      </div>
</body>