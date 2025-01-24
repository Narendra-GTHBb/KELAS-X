<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
         font-family: "Assistant", serif;
         margin: 0;
         padding: 0;
         background-color: #fff;
         color: #333;
     }
     /* .header {
         display: flex;
         justify-content: space-evenly;
         align-items: center;
         padding: 20px 40px;
         border-bottom: 1px solid #eaeaea;
     }
     .header img {
         height: 80px;
     }
     .nav {
         display: flex;
         gap: 20px;
     }
     .nav a {
         text-decoration: none;
         color: #333;
         font-size: 14px;
     }
     .nav a:hover {
         text-decoration: underline;
     }
     .icons {
         display: flex;
         gap: 20px;
     }
     .icons i {
         font-size: 18px;
         color: #333;
     }
     .content {
         max-width: 800px;
         margin: 40px auto;
         padding: 0 20px;
     }
     .content h1 {
         font-size: 36px;
         margin-bottom: 20px;
     }
     .content p {
         font-size: 16px;
         line-height: 1.6;
         margin-bottom: 20px;
     }
     .content a {
         color: black;
         text-decoration: underline;
     }
     .content a:hover {
         text-decoration: underline;
     } */

     /* slide1 */
     .container {
            display: flex;
            width: 60%;
            margin:auto;
        }
        .main-content {
            flex: 3;
            padding: 20px;
           
        }
        .sidebar {
            flex: 1;
            padding: 20px;
        }
        .cart {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #007bff;
            padding: 10px;
            color: #007bff;
            margin-bottom: 20px;
        }
        .cart i {
            margin-right: 10px;
        }
        .sidebar h3 {
            margin-top: 0;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #007bff;
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .sidebar hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .featured-products {
            margin-top: 20px;
        }
        .featured-products h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        /* products */
        .slide2 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            padding: 20px;
        }
        .product {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 200px;
        }
        .product img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .product h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product p {
            font-size: 16px;
            color: #555;
        }
        .sold-out {
            position: relative;
        }
        /* .sold-out::after {
            content: "SOLD OUT";
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #fff;
            color: #000;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        } */
        @media (max-width: 768px) {
            .slide2 {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
<body>
  <!-- <header class="header">
   <a href="../main.php"><img alt="Enkei logo" src="../image/Enkei-Logo-removebg-preview.png"/></a>
   <nav class="nav">
    <a href="#">
     Velg
     <i class="fas fa-chevron-down">
     </i>
    </a>
    <a href="#">
     Teknik
    </a>
    <a href="#">
     Pengemudi
     <i class="fas fa-chevron-down">
     </i>
    </a>
    <a href="#">
     Berita
    </a>
    <a href="#">
     Merchandise
    </a>
   </nav>
   <div class="icons">
    <a href="#"> <i class="fas fa-search">
    </i></a>
    <a href=""><i class="fas fa-user">
    </i></a>
    <a href=""><i class="fas fa-shopping-cart">
    </i></a>
   </div>
  </header> -->


  <!-- slide1 -->
  <div class="container">
   <div class="main-content">
    <img alt="" height="400" src="image/slide-ek.jpg" width="800"/>
    <div class="featured-products">
     <h2>
      Featured Products
     </h2>
    </div>
   </div>
   <div class="sidebar">
    <div class="cart">
     <i class="fas fa-shopping-cart">
     </i>
     <span>
      0 items
     </span>
     <span>
      $0.00
     </span>
    </div>
    <h3>
     Shop
    </h3>
    <ul>
     <li>
      <a href="#">
       All Products
      </a>
     </li>
     <li>
      <a href="#">
       Search...
      </a>
     </li>
     <li>
      <a href="#">
       Tees &amp; Hoodies
      </a>
     </li>
     <li>
      <a href="#">
       Decals and Stickers
      </a>
     </li>
     <li>
      <a href="#">
       RS05RR
      </a>
     </li>
    </ul>
    <hr/>
    <h3>
     Pages
    </h3>
    <ul>
     <li>
      <a href="#">
       About
      </a>
     </li>
     <li>
      <a href="#">
       Contact
      </a>
     </li>
     <li>
      <a href="#">
       Back to Wheels
      </a>
     </li>
    </ul>
   </div>
  </div>
 
  <!-- products -->
  <div class="slide2">
   <div class="product">
    <img alt="RS05RR T-Shirt Blue with a wheel design on the back" height="300" src="image/enkei shirt blue.jpg" width="200"/>
    <h3>
     RS05RR T-Shirt Blue
    </h3>
    <p>
     $20.00
    </p>
   </div>
   <div class="product">
    <img alt="RS05RR T-Shirt Black with a wheel design on the back" height="300" src="image/enkei shirt black.jpg" width="200"/>
    <h3>
     RS05RR T-Shirt Black
    </h3>
    <p>
     $12.00
    </p>
   </div>
   <div class="product">
    <img alt="ENKEI Wheels / RPF1 Hoodie with a wheel design on the front" height="300" src="image/enkei hoodie.jpg" width="200"/>
    <h3>
     ENKEI Wheels / RPF1 Hoodie
    </h3>
    <p>
     $38.00
    </p>
   </div>
   <div class="product sold-out">
    <img alt="Enkei RPF1 T-Shirt with a wheel design on the back" height="300" src="image/enkei rpt1 shirt.jpg" width="200"/>
    <h3>
     Enkei RPF1 T-Shirt
    </h3>
    <p>
     $20.00
    </p>
    </div>
    <div class="product">
    <img alt="Enkei Vinyl Stickers (x5)" height="400" src="image/enkei vinyl stickers.jpg" width="300"/>
    
     <h3>Enkei Vinyl Stickers (x5)</h3>
    
    <p>
        $5.00
    </p>
   </div>
  

   <div class="product">
    <img alt="Enkei Decals (X2)" height="400" src="image/enkei decals.jpg" width="300"/>
     <h3>Enkei Decals (X2)</h3>
    <p>
        $6.00
    </p>
   </div>

   
  </div>

  



</body>
</html>