<div class="form-container fade-in">
    <h3 class="form-title">Login Pelanggan</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </div>
        <p class="text-center mt-3">Belum punya akun? <a href="?f=home&m=daftar" class="text-primary">Daftar Sekarang</a></p>
    </form>
</div>

        <?php

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = hash('sha256',$_POST['password']);
                // print_r($password);
                // exit();
                $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
                $count =$db->rowCOUNT($sql);
                if ($count == 0) {
                    echo "<center><h3> Email atau Password salah</h3></center>";
                }else {
                    $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
                    $row=$db->getITEM($sql);

                    $_SESSION['pelanggan'] = $row['email'];
                    $_SESSION['idpelanggan'] = $row['idpelanggan'];
                    header("location: index.php");
                }
                
            }

?>