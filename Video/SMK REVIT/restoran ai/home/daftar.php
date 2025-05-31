
<div class="form-container fade-in">
    <h3 class="form-title">Registrasi Pelanggan</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="pelanggan">Nama Pelanggan</label>
            <input type="text" id="pelanggan" name="pelanggan" required placeholder="Masukkan nama Anda" class="form-control">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap" class="form-control">
        </div>

        <div class="form-group">
            <label for="telp">Nomor Telepon</label>
            <input type="text" id="telp" name="telp" required placeholder="Masukkan nomor telepon" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email aktif" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Masukkan password" class="form-control">
        </div>

        <div class="form-group">
            <label for="konfirmasi">Konfirmasi Password</label>
            <input type="password" id="konfirmasi" name="konfirmasi" required placeholder="Masukkan ulang password" class="form-control">
        </div>
      
        <div class="form-group">
            <input type="submit" name="simpan" value="Daftar Sekarang" class="btn btn-primary">
        </div>
        <p class="text-center mt-3">Sudah punya akun? <a href="?f=home&m=login" class="text-primary">Login di sini</a></p>
    </form>
</div>

<?php 

    if (isset($_POST['simpan'])) {
        $pelanggan =  $_POST['pelanggan'];
        $alamat =  $_POST['alamat'];
        $telp =  $_POST['telp'];
        $email =  $_POST['email'];
        $password = hash('sha256',$_POST['password']);
        $konfirmasi = hash('sha256',$_POST['konfirmasi']);
        $level = $_POST['level'];
        if ($konfirmasi === $password) {
            $sql = "INSERT INTO tblpelanggan VALUES  ('','$pelanggan','$alamat','$telp', '$email', '$password',1)";
            $db->runSQL($sql);
            header("location:?f=home&m=info");
        }else {
            echo "<h3>PASSWORD  TIDAK SESUAI</h3>";
        }
    }

?>
