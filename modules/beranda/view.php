
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-home icon-title"></i> Beranda</h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Persediaan Obat.
        </p>
      </div>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <div class="inner">
          <h3><?= get_jumlah_data_obat() ?></h3>
          <p>Data Obat</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Gudang') : ?>
          <a href="?module=form_obat&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php elseif ($_SESSION['hak_akses'] === 'Owner') : ?>
          <a href="?module=obat" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
        <?php endif ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div style="background-color:#00a65a;color:#fff" class="small-box">
        <div class="inner">
          <h3><?= get_jumlah_data_obat_masuk() ?></h3>
          <p>Data Obat Masuk</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-in"></i>
        </div>
        <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Gudang') : ?>
          <a href="?module=form_obat_masuk&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php elseif ($_SESSION['hak_akses'] === 'Owner') : ?>
          <a href="?module=obat_masuk" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
        <?php endif ?>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div style="background-color:#0088aa;color:#fff" class="small-box">
        <div class="inner">
          <h3><?= get_jumlah_data_obat_keluar() ?></h3>
          <p>Data Obat Keluar</p>
        </div>
        <div class="icon">
          <i class="fa fa-sign-out"></i>
        </div>
        <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Gudang') : ?>
          <a href="?module=form_obat_keluar&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php elseif ($_SESSION['hak_akses'] === 'Owner') : ?>
          <a href="?module=obat_keluar" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
        <?php endif ?>
      </div>
    </div><!-- ./col -->

    <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Owner') : ?>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
          <h3><?= get_jumlah_data_obat() ?></h3>
            <p>Laporan Stok Obat</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_stok" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    <?php endif ?>
    <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Owner') : ?>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <h3><?= get_jumlah_data_obat_masuk() ?></h3>
            <p>Laporan Obat Masuk</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_obat_masuk" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    <?php endif ?>
    <?php if ($_SESSION['hak_akses'] === 'Admin' || $_SESSION['hak_akses'] === 'Owner') : ?>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4bee;color:#fff" class="small-box">
          <div class="inner">
            <h3><?= get_jumlah_data_obat_keluar() ?></h3>
            <p>Laporan Obat Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_obat_keluar" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    <?php endif ?>
  </div><!-- /.row -->
</section><!-- /.content -->