<?php
if (isset($_GET['id'])) {
    $id=$_GET['id'];
}



$jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail WHERE idorder = '$id' ");

$banyak = 2;

$halaman = ceil($jumlahdata / $banyak) ;

if (isset($_GET['p'])) {
    $p = $_GET['p'];
   $mulai = ($p * $banyak) - $banyak;

}else{
    $mulai = 0;
}

$sql = "SELECT  * FROM vorderdetail WHERE idorder = '$id' ORDER BY idorderdetail ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);

$no = 1+$mulai;

?>


<h3 class="text-primary mb-3">Detail Pembelian</h3>

<div class="fade-in">
    <table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
    <?php 
    $grandTotal = 0;
    if (!empty($row)){  
    ?>
        <?php foreach ($row as $r): 
            $total = $r['harga'] * $r['jumlah'];
            $grandTotal += $total;
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo date('d-m-Y', strtotime($r['tglorder'])) ?></td>
            <td><?php echo $r['menu'] ?></td>
            <td>Rp. <?php echo number_format($r['harga'], 0, ',', '.') ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td>Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
        <?php endforeach ?>
        <tr class="total-row">
            <td colspan="5"><strong>Total Belanja:</strong></td>
            <td><strong class="text-primary">Rp. <?php echo number_format($grandTotal, 0, ',', '.') ?></strong></td>
        </tr>
    <?php } else { ?>
        <tr>
            <td colspan="6" class="text-center">Tidak ada data pembelian</td>
        </tr>
    <?php } ?>
    </tbody>
    </table>

    <div class="mt-3">
        <a href="?f=home&m=riwayat" class="btn btn-outline">Kembali ke Riwayat</a>
    </div>
</div>

<style>
    .total-row { background-color: #f9f5f0; }
</style>

<?php

for ($i=1; $i < $halaman; $i++) { 
    echo '<a href="?f=home&m=detail&id='.$r['idorder'].'&p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}

?>
