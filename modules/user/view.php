<?php
/// fungsi query untuk menampilkan data dari tabel user
$query = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id_user DESC")
  or die('Ada kesalahan pada query tampil data user: ' . mysqli_error($mysqli));
$rows = [];
while ($row = mysqli_fetch_assoc($query)) {
  $rows[] = $row;
}
?>
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Manajemen User
    <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if (isset($_GET['alert'])) : ?>
        <?php if ($_GET['alert'] == 1) : ?>
          <?= alert('Data user baru berhasil disimpan.') ?>
        <?php elseif ($_GET['alert'] == 2) : ?>
          <?= alert('Data user berhasil diubah.') ?>
        <?php elseif ($_GET['alert'] == 3) : ?>
          <?= alert('User berhasil diaktifkan.') ?>
        <?php elseif ($_GET['alert'] == 4) : ?>
          <?= alert('User berhasil diblokir.') ?>
        <?php elseif ($_GET['alert'] == 5) : ?>
          <?= alert('Pastikan file yang diupload sudah benar.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php elseif ($_GET['alert'] == 6) : ?>
          <?= alert('Pastikan ukuran foto tidak lebih dari 1MB.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php elseif ($_GET['alert'] == 7) : ?>
          <?= alert('Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.', 'Upload Gagal!', 'danger', 'times') ?>
        <?php endif ?>
      <?php endif ?>
      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Foto</th>
                <th class="center">Username</th>
                <th class="center">Nama User</th>
                <th class="center">Hak Akses</th>
                <th class="center">Status</th>
                <th class="center"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $no =>  $data) : ?>
                <tr>
                  <td width='50' class='center'><?= $no + 1 ?></td>
                  <?php if ($data['foto'] == "") : ?>
                    <td class='center'><img class='img-user' src='images/user/user-default.png' width='45'></td>
                  <?php else : ?>
                    <td class='center'><img class='img-user' src='images/user/<?= $data['foto'] ?>' width='45'></td>
                  <?php endif ?>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['nama_user'] ?></td>
                  <td><?= $data['hak_akses'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td class='center' width='100'>
                    <div>
                      <?php if ($data['status'] == 'aktif') : ?>
                        <a data-toggle="tooltip" data-placement="top" title="Blokir" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/user/proses.php?act=off&id=<?= $data['id_user']; ?>">
                          <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                        </a>
                      <?php else : ?>
                        <a data-toggle="tooltip" data-placement="top" title="Aktifkan" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/user/proses.php?act=on&id=<?= $data['id_user']; ?>">
                          <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                        </a>
                      <?php endif ?>
                      <a data-toggle='tooltip' data-placement='top' title='Ubah' class='btn btn-primary btn-sm' href='?module=form_user&form=edit&id=<?= $data['id_user'] ?>'>
                        <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div> <!-- /.row -->
</section><!-- /.content