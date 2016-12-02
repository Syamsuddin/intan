<?php
#######################################################################
######  Nama file : DeletePegawai.php				#######
######  Programmer: syamsuddin					#######
######  Lisensi	  : gpl						#######
######  Dibuat    : 29 Oktober 2016, 23:31 WITA			#######
#######################################################################

include 'config.php';
session_start();
if (!isset($_SESSION['login_user'])){
	header('Location:login.php');
	} else {
		$Id	= $_GET['id'];
		$sql 	= 'delete from user where Id="'.$Id.'"';
		$query	= mysqli_query($db_link,$sql);
		header('location: tampiluser.php');
	};
?>