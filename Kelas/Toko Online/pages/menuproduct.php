<?php

$jumlahdata = $database->rowCOUNT("SELECT id FROM product");
$banyak = 2;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['page'])){
    $p=$_GET['page'];
    $mulai = ($p * $banyak) - $banyak;
}else{
    $mulai =0;
}

$sql = "SELECT * FROM product ORDER BY namabarang ASC LIMIT $mulai,$banyak";
$row = $database->getALL($sql);



?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&ampdisplay=swap" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

   body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 36px;
            margin: 0;
        }
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .filters div {
            display: flex;
            align-items: center;
        }
        .filters span {
            margin-right: 10px;
            font-size: 16px;
        }
        .filters select {
            padding: 5px;
            font-size: 16px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            width: 23%;
            margin-bottom: 20px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .product h2 {
            font-size: 16px;
            margin: 10px 0 5px;
        }
        .product p {
            font-size: 14px;
            margin: 0;
        }
        @media (max-width: 768px) {
            .product {
                width: 48%;
            }
        }
        @media (max-width: 480px) {
            .filters {
                flex-direction: column;
                align-items: flex-start;
            }
            .filters div {
                margin-bottom: 10px;
            }
            .product {
                width: 100%;
            }
        }
  </style>

 <body>
  <div class="container">
   <div class="header">
    <h1>
     Tuning Series
    </h1>
   </div>
   <div class="filters">
    <div>
     <span>
      Filter:
     </span>
     <select>
      <option>
       Availability
      </option>
     </select>
     <select>
      <option>
       Price
      </option>
     </select>
    </div>
    <div>
     <span>
      Sort by:
     </span>
     <select>
      <option>
       Alphabetically, A-Z
      </option>
     </select>
     <span>
      20 products
     </span>
    </div>
   </div>
   <div class="products">
    
    <div class="product">
    <?php  foreach($row as $r): ?>
     
     <h2>
      <?php echo $r['namabarang'] ?>
     </h2>
     <p>
     <?php echo $r['id'] ?>
     </p>
     <a href="?menu=update&id=<?php echo $r['id'] ?>">
     <p>Update</p>
     </a>
     <a href="?menu=delete&id=<?php echo $r['id'] ?>">
     <p>Delete</p>
     </a>
     <?php endforeach ?>
    </div>
   
   </div>
  
   <?php

    for ($i=1; $i <= $halaman ; $i++) {
        echo '<a href="?menu=velg&page='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

    ?>

  </div>
 </body>

