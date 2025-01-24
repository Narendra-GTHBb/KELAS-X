<?php

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    $sql = "DELETE FROM menuproduct WHERE idmenuproduct=$id";

    $database->runSQL($sql);

    echo "<script>window.location.href='?menu=velg';</script>";
    exit;
}

?>