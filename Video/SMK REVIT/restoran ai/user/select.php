<?php

$jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");

$banyak = 10;

$halaman = ceil($jumlahdata / $banyak) ;

if (isset($_GET['p'])) {
    $p = $_GET['p'];
   $mulai = ($p * $banyak) - $banyak;

}else{
    $mulai = 0;
}

$sql = "SELECT  * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);

$no = 1+$mulai;

?>

<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">Tambah User</a>
</div>


<h3>Daftar User</h3>

<div class="fade-in">
<table class="table table-bordered w-70 mt-4">
<thead>
    <tr>
        <th>No</th>
        <th>User</th>
        <th>Email</th>
        <th>Level</th>
        <th>Delete</th>
        <th>Status</th>
    </tr>
</thead>

<tbody>
<?php foreach ($row as $r): ?>
    <?php
        if ($r['aktif'] ==1) {
            $status = "AKTIF";
        }else {
            $status = "BANNED";
        }
    ?>  
    
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $r['user'] ?></td>
        <td><?php echo $r['email'] ?></td>
        <td><?php echo $r['level'] ?></td>
        <td><a href="?f=user&m=delete&id=<?php echo $r['iduser'] ?>">Delete</a></td>
        <td><a href="?f=user&m=update&id=<?php echo $r['iduser'] ?>"><?= $status ?></a></td>
    </tr>
    <?php endforeach ?>
   
</tbody>

</table>
</div>

<div class="pagination">
<?php
for ($i=1; $i <= $halaman; $i++) { 
    $active = isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '';
    echo '<a class="'.$active.'" href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
}
?>
</div>
