<?php
    session_start();
    include "koneksi.php";

    $selKamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE `status` = 1 AND id_jenis_kamar=$_POST[id_jenis_kamar] LIMIT 1");
    foreach($selKamar as $row) { $id_kamar = $row['id_kamar'];}

    if($_SESSION['roles'] == 'admin') {
        $insertBooking = mysqli_query($koneksi,"INSERT INTO booking (id_kamar,id_user,check_in,check_out) VALUES ('$id_kamar','$_POST[user_id]','$_POST[checkin]','$_POST[checkout]')");
    }
    else {
        $insertBooking = mysqli_query($koneksi,"INSERT INTO booking (id_kamar,id_user,check_in,check_out) VALUES ('$id_kamar','$_SESSION[id_user]','$_POST[checkin]','$_POST[checkout]')");
    }

    $selBooking = mysqli_query($koneksi,"SELECT * FROM booking ORDER BY id_booking DESC LIMIT 1");
    foreach($selBooking as $row) { $id_booking = $row['id_booking'];}

    $insertTransaksi = mysqli_query($koneksi,"INSERT INTO transaksi (id_booking,tanggal,total_bayar) VALUES('$id_booking','$_POST[checkin]','$_POST[harga]')");

    $updateKamar = mysqli_query($koneksi,"UPDATE kamar SET `status`= 0 WHERE id_kamar = $id_kamar");

    if($_SESSION['roles'] == "admin") {
        header("Location: ../admin/index.php?page=booking");
    }
    else {
        header("Location: inv.php?ib=$id_booking");
    }
?>