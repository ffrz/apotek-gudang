<?php

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'")
  or die('Ada kesalahan pada query tampil data user : ' . mysqli_error($mysqli));
$data  = mysqli_fetch_assoc($query);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Profil User
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Profil User</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if (isset($_GET['alert'])) : ?>
        <?php if ($_GET['alert'] == 1) : ?>
          <?= alert('Profil user berhasil diubah.') ?>
        <?php elseif ($_GET['alert'] == 2) : ?>
          <?= alert('Pastikan file yang diupload sudah benar.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php elseif ($_GET['alert'] == 3) : ?>
          <?= alert('Pastikan ukuran foto tidak lebih dari 1MB.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php elseif ($_GET['alert'] == 4) : ?>
          <?= alert('Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php endif ?>
      <?php endif ?>
      <div class="box box-primary">
        <form role="form" class="form-horizontal" method="POST" action="?module=form_profil" enctype="multipart/form-data">
          <div class="box-body">
            <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">
                <?php if ($data['foto'] == "") : ?>
                  <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/user-default.png" width="75">
                <?php else : ?>
                  <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/<?= $data['foto']; ?>" width="75">
                <?php endif ?>
              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?= $data['nama_user']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Username</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?= $data['username']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?= $data['email']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telepon</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?= $data['telepon']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Hak Akses</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?= $data['hak_akses']; ?></label>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?= $data['status']; ?></label>
            </div>
          </div><!-- /.box body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="ubah" value="Ubah">
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div> <!-- /.row -->
</section><!-- /.content