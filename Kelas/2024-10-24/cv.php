<?php
$nama = "Narendra Amurti Wijaya";
 $profesi = "Siswa";
 $sekolahs = ["TK Kiddie Land", "SDK Untung Suropati 2 Sidoarjo", "SMPN 1 Sidoarjo", "SMKN 2 Buduran"];
 $alamat = "Jl. Raya Sidoarjo - Gajah Magersari No. 17";
$skills = ["HTML", "CSS", "Bootstrap", "PHP Newbie", ];
$email = "@lulohomebase@gmail.com";
$telepon = "+62895338223145";
$kelamin = "Laki-Laki";
$lahir = "Sidoarjo Jawa Timur, 08-05-2009";



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

*{
    font-family:sans-serif;
}

    body {
  font-family: Arial, Helvetica, sans-serif;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.column {
  background-color: #f2f2f2;
  padding: 20px;
  height: 700px;
  width: 300px;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.column-left {
  background-color: #007bff;
  color: white;
 
  text-align: center;
}

.profile-picture {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 20px;
 display: flex;
 margin: auto;
}

.contact-info {
  margin-top: 20px;
  margin-top: 450px;
  font-size: 15px;
  display: flex;
}

.contact-info img{
    width: 20px;
    height: 20px;
    margin-right: 5px;
}

.contact-alamat {
  margin-top: 20px;
  margin-top: 1%   ;
  font-size: 14px;
  display: flex;
  margin-left: 27px;
  /* margin-top: 240px; */
}

.contact-alamat img{
    width: 25px;
    height: 25px;
    position: absolute;
    top: 681px;
    left: 435px;
}

.contact-telepon {
  margin-top: 20px;
  margin-top: 1%   ;
  font-size: 15px;
  display: flex;
  margin-left: 27px;
  margin-top: -8px;
}

.contact-telepon img{
    width: 19px;
    height: 19px;
    position: absolute;
    top: 706px;
    left: 440px;
}


.contact-info i {
  margin-right: 5px;
  
}

.column-right {
  background-color: white;
  height: 700px;
  border: 3px solid black;
}

.column-right h2 {
  margin-top: 0;
}

.column-right ul {
  list-style-type: disc;
  margin-left: 20px;
  padding-left: 0;
}

.column-right li {
  margin-bottom: 10px;
}

.skills{
    margin-top: 60px;
}

.jns-kelamin{
    margin-top: 60px;
}

.tempat-lhr{
    margin-top: 60px;
}

</style> 
    
</head>
<body>
<div class="container">
  <div class="column column-left">
    <img src="./images/foto CV-2.jpeg" alt="Avatar" class="profile-picture">
    <h1 style="font-size: 20px;"> <?= $nama ?></h1>
    <p> <?= $profesi ?> </p>
    <div class="contact-info">
        <img src="./images/d4d584207f4efc8222add89e0ce7b2b4-removebg-preview.png" alt="">
      <i class="fas fa-envelope"> <?= $email ?> </i> <br>
    </div>

    <div class="contact-alamat">
        <img src="./images/pngtree-vector-location-icon-png-image_4277382-removebg-preview.png" alt="">
      <i class="fas fa-map-marker-alt"> <?= $alamat ?>   </i> <br>
    </div>

    <div class="contact-telepon">
        <img src="./images/download-removebg-preview (1).png" alt="">
        <p class="fas fa-phone"> <?= $telepon ?> </p> <br>
    </div>
</div>

    <div class="column column-right">
        <div class="column-isi">
            <div class="pendidikan">
                <h2>Pendidikan</h2>
                <p><?=  $sekolahs [0]; ?></p>
                <p><?=  $sekolahs [1]; ?></p>
                <p><?=  $sekolahs [2]; ?></p>
                <p><?=  $sekolahs [3]; ?></p>
            </div>
    
        <div class="skills">
        <h2>Skills</h2>
          <ul>
            <li> <?= $skills [0]; ?></li>
            <li>  <?= $skills [1]; ?></li>
            <li>  <?= $skills [2]; ?></li>
            <li>   <?= $skills [3]; ?></li>
          </ul>
        </div>
         
        <div class="jns-kelamin">
        <h2>Jenis Kelamin</h2>
        <p><?= $kelamin ?></p>
        </div>
           

        <div class="tempat-lhr">
            <h2>Tempat Lahir</h2>
            <p><?= $lahir?></p>
        </div>
    
    </div>

      </div>
</body>
</html>