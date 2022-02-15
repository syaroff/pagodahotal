<?php 

    include "../../db/koneksi.php";
    mysqli_query($koneksi,"DELETE FROM kamar WHERE id_kamar = $_GET[id]");
    header("Location: ../index.php?page=kamar&halaman=1");

?>