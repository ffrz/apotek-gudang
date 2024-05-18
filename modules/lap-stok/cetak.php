<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$no = 1;
// fungsi query untuk menampilkan data dari tabel obat
$query = mysqli_query($mysqli, "
    SELECT kode_obat,nama_obat,harga_beli,harga_jual,satuan,stok
    FROM is_obat
    ORDER BY nama_obat ASC
    ")
    or die('Ada kesalahan pada query tampil Data Obat: ' . mysqli_error($mysqli));

$count  = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>LAPORAN STOK OBAT</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
</head>

<body>
    <div id="title">
        <h4>LAPORAN STOK OBAT<br>APOTEK ENGGAL WARAS</h4>
        <p><?= tgl_eng_to_ind($hari_ini) ?></p>
    </div>
    <div id="isi">
        <table class="table" width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
                <tr class="tr-title">
                    <th height="20" align="center" valign="middle">NO.</th>
                    <th height="20" align="center" valign="middle">KODE OBAT</th>
                    <th height="20" align="center" valign="middle">NAMA OBAT</th>
                    <th height="20" align="center" valign="middle">HARGA BELI (Rp.)</th>
                    <th height="20" align="center" valign="middle">HARGA JUAL (Rp.)</th>
                    <th height="20" align="center" valign="middle">STOK</th>
                    <th height="20" align="center" valign="middle">SATUAN</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td width='40' height='13' align='center'><?= $no ?></td>
                        <td width='80' height='13' align='center'><?= $data['kode_obat'] ?></td>
                        <td style='padding-left:5px;' width='180' height='13'><?= strtoupper($data['nama_obat']) ?></td>
                        <td style='padding-right:10px;' width='80' height='13' align='right'><?= format_angka($data['harga_beli']) ?></td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'><?= format_angka($data['harga_jual']) ?></td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'><?= format_angka($data['stok']) ?></td>
                        <td width='80' height='13' align='left' valign='middle'><?= strtoupper($data['satuan']) ?></td>
                    </tr>
                    <?php $no++ ?>
                <?php endwhile ?>
            </tbody>
        </table>

        <div id="footer-tanggal">
            Talaga, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
        </div>
        <div id="footer-jabatan">
            Pimpinan
        </div>

        <div id="footer-nama">
            Juned
        </div>
    </div>
</body>

</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename = "LAPORAN STOK OBAT.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
echo $content;
// $content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
// require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');

// try
// {
//     $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
//     $html2pdf->setDefaultFont('Arial');
//     $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
//     $html2pdf->Output($filename);
// }
// catch(HTML2PDF_exception $e) { echo $e; }
?>