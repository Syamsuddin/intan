<?php
#######################################################################
######  Nama file : prosesedituserr.php						#######
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
	$Username	= $_POST['Username'];
	$Password	= $_POST['Password'];
	$Keterangan	= $_POST['Keterangan'];
 
	$sql	= 'UPDATE user SET Username="'.$Username.'", Password="'.$Password.'", Keterangan="'.$Keterangan.'" WHERE Id="'.$Id.'";';
	$query	= mysqli_query($db_link,$sql);
	if (!$query) { die('Kesalahan database: ' . mysql_error()); };

	header("location:tampiluser.php");  
	
	//echo 'ID	= '.$Id.'<br />';
	//echo 'Username	= '.$Username.'<br />';
	//echo 'Password	= '.$Password.'<br />';
	//echo 'Keterangan= '.$Keterangan.'<br />';
	//echo 'SQL	= '.$sql;
	
?>