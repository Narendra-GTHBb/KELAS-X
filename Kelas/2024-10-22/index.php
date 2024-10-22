<?php

$data = "Saya Belajar PHP di SMKN 2 BUDURAN";
$isi = "Hari ini saya belajar php";
$materi = "Materi Belajar PHP";
$sekolahs = ["TK Kiddie Land","SDK Untung Suropati 2 Sidoarjo", "SMPN 1 Sidoarjo", "SMKN 2 Buduran"];
$identitases = ["Narendra Amurti Wijaya", "JL. Gajah Perum Magersari", "lulohomebase@gmail.com", "@rendra"];

$judul = "Curriculum Vitae";
$hobies = ["Olahraga", "Berkebun", "Memasak", "Bermain Sepak Bola"];
$skills = ["HTML Expert", "CSS Expert", "PHP Expert", "PHP Intermediate", "JavaScirpt Newbie"];

$list1 = "Variabel";
$list2 = "Array";
$list3 = "Pengujian";
$list4 = "Pengulangan";
$list5 = "Function";
$list6 = "Class";
$list7 = "Object";
$list8 = "Framework";
$list9 = "PHP dan MySql";

$lists = ["Variabel", 
"Array", 
"Pengujian", 
"Pengulangan", 
"Function", 
"Class", 
"Object", 
"Framework", 
"PHP dan MySql"];

echo $data;



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kamar{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .list{
            display: flex;
            justify-content: center;
        }

       


    </style>
</head>
<body>
    <div class="header">
        <h1> <?= $judul ?> </h1>
    </div>
    <div class="identitas">
        <table>
            <thead>
                <th>
                    <tr>Identitas</tr>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td> <?= $identitases [0] ?> </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                     <td> <?= $identitases [1] ?></td>
                </tr>

             </tbody>
        </table>
    </div>
    <div class="kamar">
        <h1> <?php echo $data; ?> </h1>
        <P> <?php echo $isi; ?></P>
        <h2> <?= $materi; ?></h2>
    <ol>
        <li><?= $lists [0]; ?></li>
        <p>Varibel Adalah Wadah atau tempat untuk menyimpan data</p>
        <p>Data bisa berupa text atau string bisa juga berupa angka numerik, atau data juga bisa gabungan antara text, angka, dan simbol</p>

        <li> <?= $lists [1]; ?></li>
        <li><?= $lists [2]; ?></li>
        <li><?= $lists [3]; ?></li>
        <li><?= $lists [4]; ?></li>
        <li><?= $lists [5]; ?></li>
        <li><?= $lists [6]; ?></li>
        <li><?= $lists [7]; ?></li>
        <li><?= $lists [8]; ?></li>
    </ol>
    </div>
 
</body>
</html>

