<?php
############################################################################################
######  Nama file : edituser.php						     #######
######  Programmer: syamsuddin							     #######
######  Lisensi	  : gpl								     #######
######  Dibuat    : 16 Nopember 2016, 05:57 WITA				     #######
######  Deskripsi : berisi halaman edit jadwal kegiatan yg ada 			     #######
############################################################################################
	include 'config.php';
	$title  = 'Add User';	
	include 'header.php';
	
	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};

?>
<center>
<h3>Edit User</h3>

<form method="post" action="prosesadduser.php">

<table>
<tr>
	<td>Username</td>
	<td>:</td>
	<td width="200"><input type="text" name="Username" ></td>
<tr>
<tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="password" name="Password" ></td>
<tr>
<tr>
	<td>Keterangan</td>
	<td>:</td>
	<td><input type="text" name="Keterangan" ></td>
<tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" value="Simpan">&nbsp;&nbsp;<input type="reset" value="Reset"></td>
</table>
</form>
</center>
<?php
	include 'footer.php';
?>