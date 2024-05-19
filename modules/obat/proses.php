<?php

require_once '../_init.php';

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1

if ($_GET['act'] == 'insert') {
    if (isset($_POST['simpan'])) {
        // ambil data hasil submit dari form
        $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
        $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
        $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
        $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
        $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
        $stok       = 0;

        $created_user = $_SESSION['id_user'];

        // perintah query untuk menyimpan data ke tabel obat
        $query = mysqli_query($mysqli, "INSERT INTO obat(kode_obat,nama_obat,harga_beli,harga_jual,stok,satuan,created_user,updated_user) 
                                            VALUES('$kode_obat','$nama_obat','$harga_beli','$harga_jual','$stok','$satuan','$created_user','$created_user')")
            or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

        // cek query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil simpan data
            header("location: ../../main.php?module=obat&alert=1");
        }
    }
} elseif ($_GET['act'] == 'update') {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['kode_obat'])) {
            // ambil data hasil submit dari form
            $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
            $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
            $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
            $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
            $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

            $updated_user = $_SESSION['id_user'];

            // perintah query untuk mengubah data pada tabel obat
            $query = mysqli_query($mysqli, "UPDATE obat SET  nama_obat       = '$nama_obat',
                                                                    harga_beli      = '$harga_beli',
                                                                    harga_jual      = '$harga_jual',
                                                                    satuan          = '$satuan',
                                                                    updated_user    = '$updated_user'
                                                              WHERE kode_obat       = '$kode_obat'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=obat&alert=2");
            }
        }
    }
} elseif ($_GET['act'] == 'delete') {
    if (isset($_GET['id'])) {
        $kode_obat = $_GET['id'];

        // perintah query untuk menghapus data pada tabel obat
        $query = mysqli_query($mysqli, "DELETE FROM obat WHERE kode_obat='$kode_obat'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

        // cek hasil query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: ../../main.php?module=obat&alert=3");
        }
    }
}
