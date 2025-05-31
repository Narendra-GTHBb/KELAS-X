<h3 class="text-primary mb-3">Keranjang Belanja</h3>

<?php
if (isset($_GET['hapus'])) {
   $id = $_GET['hapus'];
   unset($_SESSION['_'.$id]);
  
  header("location:?f=home&m=beli"); //mengalihkan ke halaman keranjang belanja
}

if (isset($_GET['tambah'])) {
    $id = $_GET['tambah'];
    $_SESSION['_'.$id]++;

}

if (isset($_GET['kurang'])) {
    $id = $_GET['kurang'];
    $_SESSION['_'.$id]--;
    
    if($_SESSION['_'.$id]==0){
        unset($_SESSION['_'.$id]);
    }
}



if (!isset($_SESSION['pelanggan'])) {
   header("location: ?f=home&m=login");
}else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        isi($id);
        header("location:?f=home&m=beli");
    }else {
        keranjang();
    }
}




function isi($id){
    if (isset($_SESSION['_'.$id])) {
        $_SESSION['_'.$id]++;
       }else {
        $_SESSION['_'.$id] = 1;
       }
}

function keranjang(){

    global $db;

    $total = 0;

    global $total;

    echo '<div class="cart-container fade-in">';
    echo '<table class="table">';
    echo '<tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>';

    $empty = true;
    foreach($_SESSION as $key => $value){
        if($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser'){
            $id = substr($key,1);
            $empty = false;
            
            $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

            $row=$db->getALL($sql);

            foreach ($row as $r) {
                echo '<tr>';
                echo '<td>'.$r['menu'].'</td>';
                echo '<td>Rp. '.number_format($r['harga'], 0, ',', '.').'</td>';
                echo '<td>
                        <div class="quantity-control">
                            <a href="?f=home&m=beli&kurang='.$r['idmenu'].'" class="btn-outline quantity-btn">-</a>
                            <span class="quantity-value">'.$value.'</span>
                            <a href="?f=home&m=beli&tambah='.$r['idmenu'].'" class="btn-outline quantity-btn">+</a>
                        </div>
                      </td>';
                echo '<td>Rp. '.number_format($r['harga'] * $value, 0, ',', '.').'</td>';
                echo '<td><a href="?f=home&m=beli&hapus='.$r['idmenu'].'" class="btn btn-outline">Hapus</a></td>';
                echo '</tr>';
                $total = $total + ($value * $r['harga']);
            }

        }
    }

    if ($empty) {
        echo '<tr><td colspan="5" class="text-center">Keranjang belanja Anda kosong</td></tr>';
    } else {
        echo '<tr class="total-row">
                <td colspan=3><h3>Total Belanja:</h3></td>
                <td colspan=2><h3 class="text-primary">Rp. '.number_format($total, 0, ',', '.').'</h3></td>
            </tr>';
        
        echo '<tr>
                <td colspan=5 class="text-right">
                    <a href="?f=home&m=checkout&total='.$total.'" class="btn btn-primary">Checkout</a>
                    <a href="index.php" class="btn btn-outline">Lanjutkan Belanja</a>
                </td>
            </tr>';
    }

    echo '</table>';
    echo '</div>';

    // Tambahkan CSS inline untuk elemen-elemen khusus keranjang
    echo '<style>
        .cart-container { background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .quantity-control { display: flex; align-items: center; justify-content: center; }
        .quantity-btn { width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; margin: 0 5px; }
        .quantity-value { display: inline-block; min-width: 30px; text-align: center; }
        .total-row { background-color: #f9f5f0; }
    </style>';

}



?>

<?php

if (!empty($total)) {
    
    
?>

<a class="btn btn-primary" href="?f=home&m=checkout&total=<?php echo $total ?>" role="button">CHECKOUT</a>

<?php

}

?>