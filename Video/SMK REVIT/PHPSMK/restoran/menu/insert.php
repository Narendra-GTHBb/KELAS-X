<?php
  $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
?>
<h3>Insert Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group w-50">
            <label for="">Kategori</label> <br>
            <select name="idkategori" id="">
                <?php foreach($row as $r): ?>
                <option value="<?= $r['idkategori'] ?>"><?= $r['kategori'] ?></option>
                <?php endforeach?>
            </select>

        </div>

        <div class="form-group w-50">
            <label for="">Nama menu</label>
            <input type="text" name="menu" required placeholder="isi menu" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Harga</label>
            <input type="text" name="harga" number required placeholder="isi harga" class="form-control">
        </div>

        <div class="form-group w-50">
            <label for="">Gambar</label>
            <br>
            <input type="file" name="gambar">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>


<?php

if (isset($_POST['simpan'])) {
    $idkategori = $_POST['idkategori'];
    $menu = strip_tags($_POST['menu']); 
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    if($harga < 0){
        echo "<h3> harga tidak boleh dibawah 0 </h3>"; 
        
    }else{
        if (empty($gambar)) {
            echo "<h3> GAMBAR KOSOSONG </h3>"; 
        }else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            move_uploaded_file($temp,'../upload/'.$gambar);
            $db->runSQL($sql);
            header("Location:?f=menu&m=select");
        }
    }

    
}



?>