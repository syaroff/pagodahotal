<?php
      include "../../db/koneksi.php";
      $id = $_GET['id'];

      $koneksi->query("DELETE FROM jenis_kamar WhERE id_jenis_kamar = '$id'");
      header("location: ../index.php?page=kamar&halaman=1");
