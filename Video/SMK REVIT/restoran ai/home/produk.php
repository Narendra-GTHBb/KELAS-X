
<h3 class="text-primary mb-3">Menu Kami</h3>

<div class="mb-4">
    <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $where = "WHERE idkategori= $id";
        $id ="&id=".$id;
      }else {
        $where="";
        $id="";
      }
    ?>
</div>

<?php
$jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
$banyak = 3;
$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
}else{
    $mulai = 0;
}

$sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);
$no = 1+$mulai;
?>

<div class="menu-grid">
    <?php if (!empty($row)){  ?>
    <?php foreach ($row as $r): ?>
        <div class="menu-card fade-in">
            <div class="menu-image">
                <img src="upload/<?php echo $r['gambar'] ?>" alt="<?php echo $r['menu'] ?>">
            </div>
        <div class="menu-info">
                <h3 class="menu-title"><?php echo $r['menu'] ?></h3>
                <div class="menu-price">Rp. <?php echo number_format($r['harga'], 0, ',', '.') ?></div>
                <div class="menu-actions">
                    <a class="btn btn-primary" href="?f=home&m=beli&id=<?php echo $r['idmenu'] ?>">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php } ?>
</div>

<div class="pagination mt-4">
<?php
for ($i=1; $i <= $halaman ; $i++) { 
    $active = (isset($_GET['p']) && $_GET['p'] == $i) ? 'active' : '';
    echo '<a class="'.$active.'" href="?f=home&m=produk&p='.$i.$id.'">'.$i.'</a>';
}
?>
</div>
