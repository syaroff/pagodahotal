<?php

    include "koneksi.php";
    $selBooking = $koneksi->query("SELECT * FROM bookingVW WHERE id_booking = $_GET[ib]");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../components/head.html"; ?>
</head>
<body>
    <div class="col-4 mt-3 mx-3">
    <div class="card">
        <div class="card-body">
            <center>
                <i style="font-size: 6rem;" class="las la-hotel"></i>
                <h3 style="letter-spacing: .4em;font-weight: 700;">PAGODA HOTEL</h3>
                <br>
                <h5>TIKET KELUAR</h5>
            </center>
            <?php 
                foreach($selBooking as $row) {
            ?>
                    <div class="px-5 mt-4">
                        <pre>ID USER                : <?=$row['id_user']?></pre>
                        <pre>Username               : <?=$row['username']?></pre>
                        <pre>No Kamar               : <?=$row['no_kamar']?></pre>
                        <pre>Tanggal Check In       : <?=$row['check_in']?></pre>
                        <pre>Tanggal Check Out      : <?=$row['check_out']?></pre>
                        <pre>Jenis Kamar            : Kamar <?=$row['nama_jenis']?></pre>
                        <pre>Harga                  : <span id="harga"></span>/hari</pre>
                        <pre>Harga Bayar            : <span id="total"></span></pre>
                        <pre>Print Time             : <?=date("Y-m-h")?></pre>
                    </div>
            <?php
                }
            ?>
            <hr>
            <center>
                <p>
                    Serahkan Tiket ini ke bagian <br> Security untuk diproses & keluar dari hotel.
                </p>
            </center>
            <hr>
        </div>
    </div>
    </div>
    <script>
        const toRupiah = val => {
            const number_string = typeof val != 'string' && val.toString()
            const sisa = number_string.length % 3
            let rupiah = number_string.substr(0, sisa)
            const ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return `Rp. ${rupiah}`
        }
        let harga = <?=$row['harga']?>;
        let total = <?=$row['total_bayar']?>;
        $('#harga').text(toRupiah(harga));
        $('#total').text(toRupiah(total));
        window.print();
    </script>
</body>
</html>