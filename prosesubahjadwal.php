<?php
#######################################################################
######  Nama file : prosesubahjadwal.php						#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl											#######
######  Dibuat    : 01 Nopember 2016, 06:45 WITA					#######
######  Deskripsi : berisi halaman proses ubah jadwal kegiatan	#######
#######################################################################

	include 'config.php';
	
	session_start();
	
	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};
	
	$Id		= $_POST['Id'];
	$Nama		= $_POST['Nama'];
	$Tanggal	= ubahTanggal($_POST['Tanggal']);
	$Hari		= $_POST['Hari'];
	$Waktu		= $_POST['Waktu'];
	$Tempat		= $_POST['Tempat'];
	$Sifat		= $_POST['Sifat'];
	$Untuk		= $_POST['Untuk'];
	$Dihadiri	= $_POST['Dihadiri'];
	$Keterangan	= $_POST['Keterangan'];
 
	$sql	= 'UPDATE kegiatan SET Nama="'.$Nama.'", Tanggal="'.$Tanggal.'", Hari="'.$Hari.'", Waktu="'.$Waktu.'", Tempat="'.$Tempat.'", Sifat="'.$Sifat.'", Teruntuk="'.$Untuk.'", Dihadiri="'.$Dihadiri.'", Keterangan="'.$Keterangan.'" WHERE Id="'.$Id.'";';
	$query	= mysqli_query($db_link,$sql);
	if (!$query) { die('Kesalahan database: ' . mysql_error()); };

	header("location:tampiljadwal.php");   
/*
	echo 	$Nama.'<br />';
	echo 	$Tanggal.'<br />';
	echo 	$Hari.'<br />';
	echo 	$Waktu.'<br />';
	echo 	$Tempat.'<br />';
	echo 	$Sifat.'<br />';
	echo 	$Untuk.'<br />';
	echo 	$Dihadiri.'<br />'; 
*/
?>