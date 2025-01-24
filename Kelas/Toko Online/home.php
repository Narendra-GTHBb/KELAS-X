<?php
session_start();
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "olshop";

$koneksi = mysqli_connect($host, $user, $password, $database);


require_once "database.php";

$database = new DATABASE;

// Update the initial query to get both ID and name
$query = "SELECT id, namabarang FROM product";
$result = $koneksi->query($query);

$products = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
@import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



   body {
            margin: 0;
            font-family: "Assistant", serif;
        }
        .navbar {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            padding: 10px 20px;
            background-color: white;
            border-bottom: 1px solid #ddd;
        }
        .navbar img {
           
          width: 130px;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar ul li {
            margin: 0 15px;
            position: relative;
        }
        .navbar ul li a {
            text-decoration: none;
            color: black;
            font-weight: 500;
        }
        .navbar ul li a:hover {
            color: #007bff;
        }
        .navbar ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border: 1px solid #ddd;
            list-style: none;
            padding: 10px 0;
            margin: 0;
        }
        .navbar ul li:hover ul {
            display: block;
        }
        .navbar ul li ul li {
            margin: 0;
        }
        .navbar ul li ul li a {
            padding: 10px 20px;
            display: block;
            white-space: nowrap;
        }
        .navbar-icons {
            display: flex;
            align-items: center;
        }
        .navbar-icons a {
            margin-left: 15px;
            color: black;
            text-decoration: none;
        }
        .navbar-icons a:hover {
            color: #007bff;
        }
        .hero {
            position: relative;
            text-align: center;
            color: white;
        }
        .hero img {
            width: 100%;
            height: auto;
            filter: brightness(70%);
        }
        .hero-text {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            background:transparent;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .hero-text h1 {
            margin: 0;
            font-size: 60px;
        }
        .hero-text a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: transparent;
            color: white;
            text-decoration: none;
            border: 1px solid white;
        }
        .hero-text a:hover {
            background:transparent;
            
        }
        .whatsapp-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }

        /* footer */
        .main-footer {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            padding: 20px;
        }
        .subscribe {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            
        }
        .subscribe input[type="email"] {
            padding: 10px;
            border: 1px solid #000;
            width: 30rem;
            margin-right: 10px;
        }
        .subscribe button {
            padding: 10px;
            border: none;
            background-color: #000;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .social-icons {
            display: flex;
            gap: 15px;
        }
        .social-icons i {
            font-size: 15px;
            color: #000;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #e0e0e0;
        }
        .footer a {
            color: #000;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>

<body>
<div class="navbar">
   <a href="?menu=home"><img alt="ENKEI logo" src="image/Enkei-Logo-removebg-preview.png"/></a>
   <ul>
       <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Kategori
            </a>
            <ul class="dropdown-menu">
            <?php foreach ($products as $product): ?>
         <li>
            <a class="dropdown-item" href="?menu=velg&category_id=<?php echo $product['id']; ?>">
                <?php echo $product['namabarang']; ?>
            </a>
          </li>
            <?php endforeach; ?>
            </ul>
        </li>
    <li>
     <a href="?menu=teknik">
      Teknik
     </a>
    </li>
    <li><a href="?menu=cart">Cart</a></li>
                    <?php
                        if (!isset($_SESSION["email"])) {
                        ?>
                            <li><a href="?menu=register">Register</a></li>
                            <li><a href="?menu=login">Login</a></li>
                         <?php
                        }else{
                         ?>
                         <li><?= $_SESSION["email"] ?></li> 
                         <li><a href="?menu=logout">Logout</a></li>   
                         <?php
                          }
                         ?>
    <li>
        <a href="?menu=add">
            Tambah Barang
        </a>
    </li>
   </ul>
   <div class="navbar-icons">
    <a href="#">
     <i class="fas fa-shopping-bag">
     </i>
    </a>
   </div>
  </div>
<!-- <a href="?menu=teknik">teknik</a> -->

<div class="content">
            <?php
                if (isset($_GET["menu"])) {
                    $menu = $_GET["menu"];
                    if ($menu == "login") {
                        require_once ("login.php");
                    }
                    if ($menu == "produk") {
                        require_once ("produk.php");
                    }
                    if ($menu == "produkdetail") {
                        require_once (__DIR__."/pages/produkdetail.php");
                    }
                   if ($menu == "register") {
                        require_once ("register.php");
                    }
                    if($menu == "logout"){
                        require_once ("logout.php");
                    }
                    if ($menu == "cart"){
                        require_once ("cart.php");
                    }
                    if ($menu == "shop"){
                        require_once ("shopping.php");
                    }
                    if ($menu == "teknik"){
                        require_once(__DIR__ ."/pages/teknik.php");
                    }
                    if ($menu == "merch"){
                        require_once(__DIR__ ."/pages/merch.php");
                    }
                    if ($menu == "velg"){
                        require_once(__DIR__ ."/pages/velg.php");
                    }
                    if ($menu == "add"){
                        require_once(__DIR__ ."/pages/tambahbarang.php");
                    }
                    if ($menu == "update"){
                        require_once(__DIR__ ."/pages/update.php");
                    }
                    if ($menu == "delete"){
                        require_once(__DIR__ ."/pages/delete.php");
                    }
                    if ($menu == "transaksi"){
                        require_once(__DIR__ ."transaksi.php");
                    }
                    if ($menu == "home"){
                        require_once("main.php");
                    }

                
                } else{
                    require_once ("main.php");
                }
             ?>
  </div>

  <div class="main-footer">
        <div class="subscribe">
            <label for="email">Subscribe to our emails</label>
            <div>
                <input type="email" id="email" placeholder="Email">
                <button type="submit"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="social-icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-tiktok"></i>
        </div>
    </div>
    <div class="footer">
        <p>© 2025, Enkei Indonesia Manage by Otomax Store Dealer Velg Mobil & Ban Mobil Termurah · <a href="#">Privacy policy</a> · <a href="#">Terms of service</a> · <a href="#">Contact information</a></p>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
