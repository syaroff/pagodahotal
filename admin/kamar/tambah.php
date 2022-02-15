<?php 
    include "../../db/koneksi.php";
    $startnum = $_POST['startnum'];
    for($i = 1 ; $i <= $_POST['jumlah'] ; $i++) {
        $nomor = $startnum++;
        $insert = mysqli_query($koneksi,"INSERT INTO kamar (id_jenis_kamar,no_kamar,`status`) VALUES('$_POST[jenis]','$_POST[prefix]$nomor','1') ");

    }
    header("Location: ../index.php?page=kamar&halaman=1");

?>