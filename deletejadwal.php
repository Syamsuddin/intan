<?php
#######################################################################
######  Nama file : DeletePegawai.php				#######
######  Programmer: syamsuddin					#######
######  Lisensi	  : gpl						#######
######  Dibuat    : 29 Oktober 2016, 23:31 WITA			#######
#######################################################################
session_start();
include 'config.php';

if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	} else {
		$Id	= $_GET['Id'];
		$sql 	= 'delete from kegiatan where Id="'.$Id.'"';
		$query	= mysqli_query($db_link,$sql);
		if (!$query) { die('Kesalahan database: '.mysql_error()); };
		header('location: tampiljadwal.php');
	};

?>