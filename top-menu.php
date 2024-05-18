<?php
$query = mysqli_query($mysqli, "SELECT id_user, nama_user, foto, hak_akses FROM is_users WHERE id_user='$_SESSION[id_user]'")
  or die('Ada kesalahan pada query tampil Manajemen User: ' . mysqli_error($mysqli));
$data = mysqli_fetch_assoc($query);
?>
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?= $data['foto'] == "" ? 'images/user/user-default.png' : 'images/user/' . $data['foto'] ?>" class="user-image" alt="User Image" />
    <span class="hidden-xs"><?= $data['nama_user'] ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <li class="user-header">
      <img src="<?= $data['foto'] == "" ? 'images/user/user-default.png' : 'images/user/' . $data['foto'] ?>" class="img-circle" alt="User Image" />
      <p>
        <?= $data['nama_user'] ?>
        <small><?= $data['hak_akses'] ?></small>
      </p>
    </li>
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profil" class="btn btn-default btn-flat">Profil</a>
      </div>
      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="<?= $base_url . '/logout.php' ?>" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>