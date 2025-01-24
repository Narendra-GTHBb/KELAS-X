<?php
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

// Tambahkan ini setelah koneksi database
// echo "Category ID: " . ($category_id ?? 'none') . "<br>";
// echo "Page: " . ($p ?? '1') . "<br>";


// Initialize variables
$message = '';
$banyak = 8; // Items per page
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : null;

// Determine the starting point for the current page

// Count total products for the selected category
// Setelah inisialisasi variabel
$queryCount = "SELECT COUNT(*) FROM menuproduct WHERE idproduct = ?";
$stmtCount = mysqli_prepare($koneksi, $queryCount);

if ($category_id === null) {
    // Jika tidak ada kategori dipilih, hitung semua produk
    $queryCount = "SELECT COUNT(*) as total FROM menuproduct";
    $stmtCount = mysqli_prepare($koneksi, $queryCount);
} else {
    // Jika kategori dipilih, hitung berdasarkan kategori
    $queryCount = "SELECT COUNT(*) as total FROM menuproduct WHERE idproduct = ?";
    $stmtCount = mysqli_prepare($koneksi, $queryCount);
    mysqli_stmt_bind_param($stmtCount, "i", $category_id);
}

mysqli_stmt_execute($stmtCount);
$resultCount = mysqli_stmt_get_result($stmtCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$jumlahdata = $rowCount['total'];
mysqli_stmt_close($stmtCount);


// Fetch products
if ($category_id === null) {
    // Tampilkan semua produk jika tidak ada kategori dipilih
    $sql = "SELECT * FROM menuproduct ORDER BY menu ASC LIMIT ?, ?";
    $stmtProducts = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmtProducts, "ii", $mulai, $banyak);
} else {
    // Filter produk berdasarkan kategori
    $sql = "SELECT * FROM menuproduct WHERE idproduct = ? ORDER BY menu ASC LIMIT ?, ?";
    $stmtProducts = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmtProducts, "iii", $category_id, $mulai, $banyak);
}

// Calculate total pages
$halaman = ceil($jumlahdata / $banyak);

// Determine the starting point for the current page
if (isset($_GET['page'])) {
    $p = intval($_GET['page']);
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}

// Fetch products for the selected category with pagination
$sql = "SELECT * FROM menuproduct WHERE idproduct = ? ORDER BY menu ASC LIMIT ?, ?";
$stmtProducts = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmtProducts, "iii", $category_id, $mulai, $banyak);
mysqli_stmt_execute($stmtProducts);
$resultProducts = mysqli_stmt_get_result($stmtProducts);

$products = [];
if ($resultProducts) {
    while ($row = mysqli_fetch_assoc($resultProducts)) {
        $products[] = $row;
    }
}
mysqli_stmt_close($stmtProducts);


?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    /* Basic styles for layout */
    body {
        font-family: 'Assistant', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .header {
        text-align: center;
        margin-bottom: 40px;
    }

    .header h1 {
        font-size: 42px;
        margin: 0;
        color: #2c3e50;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    /* .product { */
        /* background: white;
        border-radius: 10px;
        padding: 15px; */
        /* transition: transform 0.3s ease, box-shadow 0.3s ease; */
        /* box-shadow: 0 2px 5px rgba(0,0,0,0.05); */
    /* } */

    /* .product:hover {
        transform: translateY(-5px);
        /* box-shadow: 0 5px 15px rgba(0,0,0,0.1); */
    /* } */ */

    .product-image {
        width: 100%;
        height: 280px;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .product-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-image img:hover{
        transform: translateY(-5px);
    }

    .product h2 {
        font-size: 18px;
        margin: 10px 0;
        color: #2c3e50;
        font-weight: 500;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
    }

    .pagination a {
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        background-color: #007bff; /* Bootstrap primary color */
        color:white; 
    }

    .pagination a:hover {
       background-color:#0056b3; /* Darker shade */
       color:white; 
   }
</style>

<body>
<div class="container">
   <div class="header">
       <h1></h1>
   </div>

   <div class="products">
    <?php if (count($products) > 0): ?>
        <?php foreach ($products as $r): ?>
            <div class="product">
                <div class="product-image">
                    <img src="<?php echo 'uploads/' . htmlspecialchars($r['gambar']); ?>" alt="<?php echo htmlspecialchars($r['menu']); ?>">
                </div>
                <h2><?php echo htmlspecialchars($r['menu']); ?></h2>
                <p>Harga: Rp <?php echo number_format($r['harga'], 2, ',', '.'); ?></p>
                <div class="actions">
                    <a href="?menu=produkdetail&id=<?php echo htmlspecialchars($r['idmenuproduct']); ?>">Beli</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No products found in this category.</p>
    <?php endif; ?>
</div>


   <div class="pagination">
    <?php
    for ($i=1; $i <= $halaman; $i++) {
        $current = isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '';
        echo '<a class="'.$current.'" href="?menu=velg&page='.$i.'&category_id='.($category_id ?? '').'">'.$i.'</a>';
    }
    ?>
</div>
</div>
</body>
