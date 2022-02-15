<?php
      include "../../db/koneksi.php";
      $no = $_POST['nama_tipe'];
      $harga = $_POST['harga'];

      $koneksi->query("INSERT INTO jenis_kamar (nama_jenis,harga) VALUES ('$no', '$harga')");
      header("location: ../index.php?page=kamar&halaman=1");
