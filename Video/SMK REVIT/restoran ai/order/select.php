<?php

$email = isset($_SESSION['pelanggan']) ? $_SESSION['pelanggan'] : '';
$jumlahdata = $db->rowCOUNT("SELECT idorder FROM vorder");

$banyak = 5;

$halaman = ceil($jumlahdata / $banyak) ;

if (isset($_GET['p'])) {
    $p = $_GET['p'];
   $mulai = ($p * $banyak) - $banyak;

}else{
    $mulai = 0;
}

$sql = "SELECT  * FROM vorder ORDER BY status,idorder ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);

$no = 1+$mulai;

?>


<h3>Order Pembelian</h3>

<div class="fade-in">
<table class="table table-bordered w-50">
<thead>
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembali</th>
        <th>Status</th>
        
       
    </tr>
</thead>

<tbody>
<?php if (!empty($row)){  ?>
    <?php foreach ($row as $r): ?>
        <?php
        if ($r['status']==0) {
            $status = ' <td><a href="?f=order&m=bayar&id='.$r['idorder'].'">Bayar</a></td>' ;
        }else{
            $status = '<td>Selesai</td>';
        }
        ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $r['pelanggan'] ?></td>
        <td><?php echo $r['tglorder'] ?></td>
        <td><?php echo $r['total'] ?></td>
        <td><?php echo $r['bayar'] ?></td>
        <td><?php echo $r['kembali'] ?></td>
        
        <?php echo $status?>
       
    </tr>
    <?php endforeach ?>
   <?php } ?>
</tbody>

</table>
</div>

<div class="pagination">
<?php
for ($i=1; $i <= $halaman; $i++) { 
    $active = isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '';
    echo '<a class="'.$active.'" href="?f=order&m=select&p='.$i.'">'.$i.'</a>';
}
?>
</div>
