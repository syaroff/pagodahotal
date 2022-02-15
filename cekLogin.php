<?php
include "./db/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

if (!$username || !$password) return header('location: login.php?error=Masukkan username atau password');

$user = $koneksi->query("SELECT * FROM user WHERE username = '$username' AND `password` = '$password'");

$row = $user->fetch_assoc();

if (!$row) return header('location: login.php?error=User tidak ditemukan');

session_start();
$_SESSION['username'] = $row['username'];
$_SESSION['id_user'] = $row['id_user'];
$_SESSION['roles'] = $row['roles'];

if ($row['roles'] == 'admin') return header('location: admin/index.php?page=kamar$halaman=1r');
if ($row['roles'] == 'user') return header('location: index.php');
