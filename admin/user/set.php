<?php 

    include "../../db/koneksi.php";
    mysqli_query($koneksi,"UPDATE user SET `password` = MD5('1234') WHERE id_user = $_GET[i]");
    header("Location: ../index.php?page=user");

?>