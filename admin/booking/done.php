<?php

    include "../../db/koneksi.php";
    $upKamar = mysqli_query($koneksi,"UPDATE kamar SET `status` = 1 WHERE id_kamar = $_GET[ik]");

    $delBooking = mysqli_query($koneksi,"DELETE FROM booking WHERE id_booking =$_GET[ib]");

    header("Location: ../index.php?page=booking");

?>