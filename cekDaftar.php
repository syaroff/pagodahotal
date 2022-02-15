<?php
include "./db/koneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);

$koneksi->query("INSERT INTO user (`username`, `roles`, `password`, `email`, `no_telp`, `alamat`) VALUES ('$username','user','$password','$email','$no_telp','$alamat')");

header("location: ./login.php");