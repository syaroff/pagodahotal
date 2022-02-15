<?php 
	include "../../db/koneksi.php";
	$nama_jenis = $_POST['nama_tipe_kamar'];
	$harga = $_POST['harga'];
	$id = $_POST['id_jenis_kamar'];

	$koneksi->query("UPDATE jenis_kamar SET nama_jenis = '$nama_jenis', harga = '$harga' WHERE id_jenis_kamar = '$id'");
	header("location: ../index.php?page=kamar&halaman=1");
