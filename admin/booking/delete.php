<?php

    include "../../db/koneksi.php";
    $deleteBooking = $koneksi->query("DELETE FROM booking WHERE id_booking = $_GET[ib]");

    $deleteTransaksi = $koneksi->query("DELETE FROM transaksi WHERE id_booking -= $_GET[ib]");

    $setKamar = $koneksi->query("UPDATE kamar SET `status`=1 WHERE id_kamar=$_GET[ik]");
    header("Location: ../index.php?page=booking");
?>