<?php

function format_angka($angka)
{
	$rupiah = number_format($angka, 0, ',', '.');
	return $rupiah;
}

// Fungsi format uang dalam rupah
function format_rupiah($angka)
{
	$rupiah = number_format($angka, 0, ',', '.');
	return $rupiah;
}

// Fungsi rupiah untuk laporan pada halaman admin
function rp($uang)
{
	$rp = "";
	$digit = strlen($uang);

	while ($digit > 3) {
		$rp = "." . substr($uang, -3) . $rp;
		$lebar = strlen($uang) - 3;
		$uang  = substr($uang, 0, $lebar);
		$digit = strlen($uang);
	}
	$rp = $uang . $rp . ",-";
	return $rp;
}

/**
 * Konversi $date dd-mm-yyyy ke yyyy-mm-dd
 */
function date_from_input($date)
{
	$array = explode('-', $date);
	return $array[2] . "-" . $array[1] . "-" . $array[0];
}

/**
 * Konversi $tgl yyyy-mm-dd ke dd-mm-yyyy
 */
function tgl_indo_short($tgl)
{
	$tanggal = $tgl;
	$exp = explode('-', $tanggal);
	return $exp[2] . "-" . $exp[1] . "-" . $exp[0];
}

/**
 * Konversi $tgl dari format yyyy-mm-dd ke d mmmm yyyy
 */
function tgl_eng_to_ind($tgl)
{
	$tanggal	= explode('-', $tgl);
	$kdbl		= $tanggal[1];

	if ($kdbl == '01') {
		$nbln = 'Januari';
	} else if ($kdbl == '02') {
		$nbln = 'Februari';
	} else if ($kdbl == '03') {
		$nbln = 'Maret';
	} else if ($kdbl == '04') {
		$nbln = 'April';
	} else if ($kdbl == '05') {
		$nbln = 'Mei';
	} else if ($kdbl == '06') {
		$nbln = 'Juni';
	} else if ($kdbl == '07') {
		$nbln = 'Juli';
	} else if ($kdbl == '08') {
		$nbln = 'Agustus';
	} else if ($kdbl == '09') {
		$nbln = 'September';
	} else if ($kdbl == '10') {
		$nbln = 'Oktober';
	} else if ($kdbl == '11') {
		$nbln = 'November';
	} else if ($kdbl == '12') {
		$nbln = 'Desember';
	} else {
		$nbln = '';
	}

	$tgl_ind = (int)$tanggal[2] . " " . $nbln . " " . $tanggal[0];
	return $tgl_ind;
}

function e($text) {
	return htmlspecialchars($text);
}

function alert($message, $title = 'Sukses!' ,$type = 'success', $icon = 'check')
{
?>
	<div class='alert alert-<?= $type ?> alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<h4> <i class='icon fa fa-<?= $icon ?>-circle'></i> <?= e($title) ?></h4>
		<?= e($message) ?>
	</div>
<?php
}
