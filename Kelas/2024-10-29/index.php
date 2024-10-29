<?php

$sekolah = ["TK Kiddie Land", "SDK Unutng Suropati 2", "SMPN 1 SIDOARJO", "SMKN 2 BUDURAN"];

$sekolahs = ["TK" =>"TK Kiddie Land", 
            "SD" =>"SDK Untung Suropati 2", 
            "SMP" =>"SMPN 1 SIDOARJO", 
            "SMK" =>"SMKN 2 BUDURAN",
            "PT"  => "OXFORD UNIVERSITY"];

$skills = ["C++" => "Expert", "HTML" => "Newbie", "CSS" => "Newbie", "PHP" => "Intermediate", "JavaScript" => "Intermediate"];

$identitas = ["Nama" => "Narendra Amurti Wijaya", "Alamat" => "JL. Gajah Magersari No.17", "Email" => "lulohomebase@gmail.com", "FB" => "Kapibara Keseleo", "Tiktok" => "@curut air", "IG" => "@ren_ndrut"];

$hobi = ["Coding", "Masak", "Olahraga", "Ngegame", "Berkebun"];

// echo $sekolah [0];

// echo "<br>";

// echo $sekolahs ["TK"];  //Array Asosiatif

// echo "<br>";

// echo $sekolah[1];

// echo "<br>";

// echo $sekolahs ["SD"];  

// echo "<br>";

// //Menampilkan semua value array

// for ($i=0; $i <4 ; $i++) { 
//     echo $sekolah [$i];
    
//     echo "<br>";
// }

// echo "<br>";    


// //Meggunakan foreach
// foreach ($sekolah as $key) {
//     echo $key;
//     echo "<br>";
// }

// echo "<br>";

// foreach ($sekolahs as $key => $value) {
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }

// echo "<br>";

// foreach ($skills as $key => $value) {
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }


if (isset($_GET['menu'])) {
    $menu = $_GET['menu'] ;
    echo $menu;
}
    

?>



<hr>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="?menu=home">Home</a></li>
        <li><a href="?menu=cv">CV</a></li>
        <LI><a href="?menu=project">Project</a></LI>
        <li><a href="?menu=contact">Contact</a></li>
    </ul>
    
    <h2>IDENTITAS</h2>
    
<table border="1px">  
    <thead>
        <tr>
            <th>IDENTITAS</th>
            <th>DESKRIPSI</th>
        </tr>
    </thead>

    <TBody>
        <?php 
        foreach ($identitas as $key => $value) {
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$value."</td>";
        }
        ?>
    </TBody>
</table>

<hr>

<h2>Riwayat Sekolah</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Jenjang</th>
                <th>Nama Sekolah</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($sekolahs as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }
            ?>
    </tbody>
</table>
    
<hr>

<h2>Skills</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Level</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                foreach ($skills as $key => $value) {
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php
            }
            ?>
    </tbody>
</table>

<hr>

<h2>Hobi</h2>
    <ul>
        <?php foreach ($hobi as $key) {
        ?>
            <li><?php echo $key ?></li>
       <?php
        }
        ?>
    </ul>

</body>
</html>