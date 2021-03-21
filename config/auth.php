<?php
//Membuat Token Keamanan Ajax Request (Csrf Token)
session_start();

include 'config/koneksi.php';

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
 
//CEK LOGIN USER JIKA ADA TAMBAHKAN DIBAWAH INI
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
?>