<?php
#######################################################################
######  Nama file : prosesinputjadwal.php						#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl											#######
######  Dibuat    : 29 Oktober 2016, 09:42 WITA					#######
######  Deskripsi : berisi halaman proses input jadwal kegiatan	#######
#######################################################################

	include 'config.php';

	session_start();
	
	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};

	$Nama		= $_POST['Nama'];
	$Tanggal	= $_POST['Tanggal'];
	$Hari		= $_POST['Hari'];
	$Waktu		= $_POST['Waktu'];
	$Tempat		= $_POST['Tempat'];
	$Sifat		= $_POST['Sifat'];
	$Untuk		= $_POST['Untuk'];
	$Dihadiri	= $_POST['Dihadiri'];

	$sql	= 'insert into kegiatan (Nama, Tanggal, Hari, Waktu, Tempat, Sifat, Teruntuk, Dihadiri) values 
	("'.$Nama.'","'.$Tanggal.'","'.$Hari.'","'.$Waktu.'","'.$Tempat.'","'.$Sifat.'","'.$Untuk.'","'.$Dihadiri.'")';
	$query	= mysqli_query($db_link,$sql);
	if (!$query) { die('Kesalahan database: ' . mysql_error()); };

	header("location:tampiljadwal.php");  
	
/*	echo 	$Nama.'<br />';
	echo 	$Tanggal.'<br />';
	echo 	$Hari.'<br />';
	echo 	$Waktu.'<br />';
	echo 	$Tempat.'<br />';
	echo 	$Sifat.'<br />';
	echo 	$Untuk.'<br />';
	echo 	$Dihadiri.'<br />'; */

?>