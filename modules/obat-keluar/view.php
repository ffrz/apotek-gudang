<!-- Aplikasi Persediaan Obat pada Apotek
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 1 April 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-856-6991-9769
-->

<!-- Content Header (Page header) -->
<?php

// fungsi query untuk menampilkan data dari tabel obat
$query = mysqli_query($mysqli, "
  SELECT
    a.kode_transaksi,
    a.tanggal_keluar,
    a.kode_obat,
    a.jumlah_keluar,
    b.kode_obat,
    b.nama_obat,
    b.satuan
  FROM is_obat_keluar as a
  INNER JOIN is_obat as b ON a.kode_obat=b.kode_obat
  ORDER BY kode_transaksi DESC
  ")
  or die('Ada kesalahan pada query tampil Data Obat Keluar: ' . mysqli_error($mysqli));

// tampilkan data
$items = [];
while ($item = mysqli_fetch_assoc($query)) {
  array_push($items, $item);
}
?>
<section class="content-header">
  <h1>
    <i class="fa fa-sign-out icon-title"></i> Data Obat Keluar

    <?php if ($_SESSION['hak_akses'] == 'Admin' || $_SESSION['hak_akses'] == 'Gudang') : ?>
      <a class="btn btn-primary btn-social pull-right" href="?module=form_obat_keluar&form=add" title="Tambah Data" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Tambah
      </a>
    <?php endif ?>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?php
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      }
      // jika alert = 1
      // tampilkan pesan Sukses "Data Obat Keluar berhasil disimpan"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Obat Keluar berhasil disimpan.
            </div>";
      }
      ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel Obat -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">Jumlah Keluar</th>
                <th class="center">Satuan</th>
                <?php if ($_SESSION['hak_akses'] == 'Admin') : ?>
                  <th class="center">Aksi</th>
                <?php endif ?>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
              <?php foreach ($items as $num => $item) : ?>
                <tr>
                  <td width='30' class='center'><?= $num + 1 ?></td>
                  <td width='100' class='center'><?= $item['kode_transaksi'] ?></td>
                  <td width='80' class='center'><?= tgl_indo_short($item['tanggal_keluar']) ?></td>
                  <td width='80' class='center'><?= $item['kode_obat'] ?></td>
                  <td width='200'><?= $item['nama_obat'] ?></td>
                  <td width='100' align='right'><?= $item['jumlah_keluar'] ?></td>
                  <td width='80' class='center'><?= $item['satuan'] ?></td>
                  <?php if ($_SESSION['hak_akses'] == 'Admin') : ?>
                    <td class="center" width='30'>
                      <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm"
                        href="modules/obat-keluar/proses.php?act=delete&kode_transaksi=<?= $item['kode_transaksi'] ?>"
                        onclick="return confirm('Anda yakin ingin menghapus data obat keluar <?= $item['kode_transaksi'] ?> ?');">
                        <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                      </a>
                    </td>
                  <?php endif ?>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div> <!-- /.row -->
</section><!-- /.content