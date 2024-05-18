<?php

$base_url = '';

require_once "config/database.php";
require_once "helper/fungsi.php";
require_once "helper/database.php";

session_start();

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header('Location: ' . $base_url . '/index.php?alert=1');
}
