
<html>
 <head>
  <title>
   ENKEI
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
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
            transition: all ease-in-out 100ms;
            border: 3px solid white;
        }
        @keyframes border{
            from{
                border: 1px solid white;
            }
            to{
                border: 3px solid white;

            }
        }
        .whatsapp-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }

        /* slide 2 */
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px 0;
        }
        .series {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 60px;
            margin-bottom: 40px;
        }
        .series-item {
            text-align: center;
        }
        .series-item img {
            width: 150px;
            height: auto;
        }
        .series-item p {
            margin: 10px 0 0;
            font-size: 14px;
            font-style: italic;
        }
        .series-item a {
            display: block;
            margin-top: 5px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }
        .news-section {
            margin-top: 40px;
        }
        .news-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .news-item {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }
        .news-item img {
            width: 100%;
            height: auto;
        }
        .news-item h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .news-item p {
            font-size: 14px;
            margin: 5px 0;
        }
        .news-item .date {
            font-size: 12px;
            color: #999;
        }

        /* slide3 */
        .slide3 {
            position: relative;
            text-align: center;
            color: white;
        }
        .slide3 img
        {
            width: 100%;
            height: auto;
            filter: brightness(70%);
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 40%;
            transform: translate(-50%, -50%);
            text-align: start;
        }
        .centered h1 {
            font-size: 2.5em;
            margin: 0;
        }
        .centered p {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .centered .button  {
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            border-radius: 5px;
        
        }
        .view-all {
            text-align: center;
            margin: 20px 0;
        }
        .view-all a {
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
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
 </head>
 <body>
  <!-- <div class="navbar">
   <img alt="ENKEI logo" src="image/Enkei-Logo-removebg-preview.png"/>
   <ul>
    <li>
     <a href="#">
      Velg
     </a>
     <ul>
      <li>
       <a href="#">
        Submenu 1
       </a>
      </li>
      <li>
       <a href="#">
        Submenu 2
       </a>
      </li>
     </ul>
    </li>
    <li>
     <a href="?menu=teknik">
      Teknik
     </a>
    </li>
    <li>
     <a href="#">
      Pengemudi
     </a>
    </li>
    <li>
     <a href="#">
      Berita
     </a>
    </li>
    <li>
     <a href="./pages/merch.php">
      Merchandise
     </a>
    </li>
   </ul>
   <div class="navbar-icons">
    <a href="#">
     <i class="fas fa-search">
     </i>
    </a>
    <a href="#">
     <i class="fas fa-user">
     </i>
    </a>
    <a href="#">
     <i class="fas fa-shopping-bag">
     </i>
    </a>
   </div>
  </div> -->
  <div class="hero">
   <img alt="./" src="./image/tampilanhome2.jpg"/>
   <div class="hero-text">
    <h1>
     Velg Berkualitas Tinggi.
    </h1>
    <a href="#" >
     Selengkapnya
    </a>
   </div>
  </div>
  <a class="whatsapp-icon" href="https://wa.me/1234567890">
   <img alt="WhatsApp icon" src="https://placehold.co/50x50"/>
  </a>



  <!-- slide 2 -->
  <div class="container">
   <div class="series">
    <div class="series-item">
     <a href="?menu=velg&category_id=2"><img alt="Tuning Series wheel" src="./image/ENKEI TUNING.jpg"/></a>
     <a href="?menu=velg&category_id=2" style="font-style: italic; font-weight:14px">
      Tuning Series 
     </a>
     <a href="?menu=velg&category_id=2">
      Tuning Series →
     </a>
    </div>
    <div class="series-item">
     <a href="?menu=velg&category_id=30"><img alt="Racing Series wheel" src="./image/ENKEI RACING SERIES.jpg"/></a>
     <a href="?menu=velg&category_id=30" style="font-style: italic; font-weight:14px">
      Racing Series 
     </a>
     <a href="?menu=velg&category_id=30">
      Racing Series →
     </a>
    </div>
    <div class="series-item">
     <a href="?menu=velg&category_id=32"><img alt="Performance Series wheel" src="./image/ENKEI PERFORMANCE.jpg"/></a>
     <a href="?menu=velg&category_id=32" style="font-style: italic; font-weight:14px">
      Performance Series 
     </a>
     <a href="?menu=velg&category_id=32">
      Performance Series →
     </a>
    </div>
    <div class="series-item">
     <a href="?menu=velg&category_id=35"><img alt="Truck &amp; SUV wheel" src="./image/ENKEI TRUCK SERIES.jpg"/></a>
     <a href="?menu=velg&category_id=35" style="font-style: italic; font-weight:14px">
      Truck &amp; SUV 
     </a>
     <a href="?menu=velg&category_id=35">
      Truck &amp; SUV →
     </a>
    </div>
   </div>
   <div class="news-section">
    <h2>
     Berita
    </h2>
    <div class="news-grid">
     <div class="news-item">
      <img alt="Drifting car on track" src="./image/berita1.jpg"/>
      <h3>
       Rekap Formula Drift Long Beach Michael Essa!
      </h3>
      <p class="date">
       November 17, 2024
      </p>
      <p>
       -Selasa:Hari media-memperkenalkan corak mobil tahun 2022. Merekam konten dengan Throdle (aplikasi media sosial mobil) dan...
      </p>
     </div>
     <div class="news-item">
      <img alt="Grey car in a garage" src="./image/berita2.jpg"/>
      <h3>
       Fitur D-Sport Gen ZX Enkei RS05RR
      </h3>
      <p class="date">
       November 17, 2024
      </p>
      <p>
       Seperti yang terlihat di D-Sport, 300zx ini tampak luar biasa dengan Velg Enkei RS05RR Racing Revolution. Foto-foto lainnya ada di bawah ini...
      </p>
     </div>
     <div class="news-item">
      <img alt="Honda Civic hatchback in a garage" src="image/berita3.jpg"/>
      <h3>
       Civic Time Attack 750 Tenaga Kuda – RPF1
      </h3>
      <p class="date">
       November 17, 2024
      </p>
      <p>
       Semuanya berawal 2 tahun yang lalu di garasi saya. Sasis Honda Civic hatchback dan impian untuk membangun salah satu mobil time attack tercepat di dunia. Dibalik...
      </p>
     </div>
     <div class="news-item">
      <img alt="Michael Essa with his team" src="./image/berita4.jpg"/>
      <h3>
       Michael Essa – Rekap Formula Drift Orlando
      </h3>
      <p class="date">
       November 17, 2024
      </p>
      <p>
       Kami memulai dengan latihan hari Kamis di mana mobil terasa kurang bertenaga dan kesulitan saat memulai ke sesi latihan. Pada...
      </p>
     </div>
    </div>
   </div>
  </div>


     <!-- slide3 -->
    
     <div class="view-all">
   <a href="#">
    View all
   </a>
  </div>
  <div class="slide3">
   <img alt="Two cars racing on a track" src="./image/tampilanhome2.jpg"/>
   <div class="centered">
    <h1>
     Dari Awal Berdiri Hingga Menjadi <br> Pilihan Pecinta Otomotif
    </h1>
    <p>
     Dengan reputasi kuat di bidang motorsport, Enkei terus berinovasi dalam teknologi dan desain. Pada 1986, Enkei mengembangkan teknologi MAT (Most Advanced Technology), yang menghasilkan velg yang lebih kuat dan ringan. Teknologi ini memungkinkan velg Enkei menjadi pilihan utama, baik di kalangan modifikasi jalanan maupun ajang balap profesional.
    </p>
    <a class="button" href="#"> 
     Selengkapnya
    </a>
   </div>
  </div>

  <!-- <div class="content">
            <?php
                if (isset($_GET["menu"])) {
                    $menu = $_GET["menu"];
                    if ($menu == "login") {
                        require_once ("login.php");
                    }
                    if ($menu == "produk") {
                        require_once ("produk.php");
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
                    if ($menu == "add"){
                        require_once ("addbarang.php");
                    }
                    if ($menu == "teknik"){
                        require_once(__DIR__ ."/pages/teknik.php");
                    }
                    if ($menu == "merch"){
                        require_once(__DIR__ ."/pages/merch.php");
                    }
                    if ($menu == "tuning"){
                        require_once(__DIR__ ."/pages/tuningseries.php");
                    }
                    if ($menu == "home"){
                        require_once("main.php");
                    }

                
                } else{
                    require_once ("main.php");
                }
             ?>
 </div> -->
</body>
</html>



  
 

 
<!-- <a href="product.php">Tambah Barang Baru</a> -->
<!-- <div class="container mt-5">
        <h2>Our Products</h2><br>
        <a href="product.php" class="btn btn-primary">Tambah Barang Baru</a>
    </div>
 -->


    

