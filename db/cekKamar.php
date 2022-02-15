<?php 

    include "koneksi.php";
    $jenis_kamar = [];
    $selectJenisKamar = mysqli_query($koneksi,"SELECT * FROM jenis_kamar");
    foreach($selectJenisKamar as $rowJenisKamar) {
        array_push($jenis_kamar,$rowJenisKamar['id_jenis_kamar']);
    }
    $j = sizeof($jenis_kamar);
        for($i=0;$i<$j;$i++) {
            $cekKamar = mysqli_query($koneksi,"SELECT COUNT(*) as total FROM kamar WHERE `status` = 1 AND id_jenis_kamar=$jenis_kamar[$i]");
            foreach($cekKamar as $row ) {
                if($row['total'] == 0) {
                    $deleteComment = mysqli_query($koneksi,"UPDATE jenis_kamar SET status_jenis= 0 WHERE id_jenis_kamar=$jenis_kamar[$i]");
                }
                if($row['total'] > 0) {
                    $deleteComment = mysqli_query($koneksi,"UPDATE jenis_kamar SET status_jenis= 1 WHERE id_jenis_kamar=$jenis_kamar[$i]");
                }
            }
        }

?>