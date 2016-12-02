<?php
#######################################################################
######  Nama file : prosesadduser.php						#######
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
	
	$Username	= $_POST['Username'];
	$Password	= $_POST['Password'];
	$Keterangan	= $_POST['Keterangan'];
 
	$sql	= 'INSERT INTO user (Username, Password, Keterangan) VALUES ("'.$Username.'", "'.$Password.'", "'.$Keterangan.'" );';
	//echo $sql;
	$query	= mysqli_query($db_link,$sql);
	if (!$query) { die('Kesalahan database: ' . mysql_error()); };

	header("location:tampiluser.php");  
	
?>