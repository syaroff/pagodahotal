<?php 

    include "../../db/koneksi.php";
    mysqli_query($koneksi,"DELETE FROM user WHERE id_user = $_GET[id]");
    header("Location: ../index.php?page=user");

?>