<?php

$base_url = '';

// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "12345";
$database = "gudang_enggalwaras";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
