<?php 

    include "../../db/koneksi.php";
    $status = 1;
    if($_GET['s'] > 0) {
        $status = 0;
    }
    $update = mysqli_query($koneksi,"UPDATE kamar SET `status` = $status WHERE id_kamar = $_GET[i]");
    header("Location: ../index.php?page=kamar&halaman=1");
    // echo "UPDATE kamar SET `status` = $status WHERE id_kamar = $_GET[i]";

?>