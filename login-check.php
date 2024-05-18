<?php

require_once "_config.php";

// ambil data hasil submit dari form
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) or !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
} else {
	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'")
		or die('Ada kesalahan pada query user: ' . mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);
		// cek dulu passwordnya harus sama dan statusnya harus aktif
		if ($data['password'] == $password && $data['status'] == 'aktif') {
			session_start();
			$_SESSION['id_user']   = $data['id_user'];
			$_SESSION['username']  = $data['username'];
			$_SESSION['password']  = $data['password'];
			$_SESSION['nama_user'] = $data['nama_user'];
			$_SESSION['hak_akses'] = $data['hak_akses'];
			// lalu alihkan ke halaman user
			header("Location: main.php?module=beranda");
			exit;
		}
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	header("Location: index.php?alert=1");
}
