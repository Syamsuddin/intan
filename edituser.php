<?php
############################################################################################
######  Nama file : edituser.php						     #######
######  Programmer: syamsuddin							     #######
######  Lisensi	  : gpl								     #######
######  Dibuat    : 16 Nopember 2016, 05:57 WITA				     #######
######  Deskripsi : berisi halaman edit jadwal kegiatan yg ada 			     #######
############################################################################################
	include 'config.php';
	$title  = 'Edit User';
	include 'header.php';

	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};
	
	if(isset($_GET['id'])){
		$Id	= $_GET['id'];
		$query	= mysqli_query($db_link,'select * from user where Id = "'.$Id.'"');
		$data  	= mysqli_fetch_array($query);
		
		$Username	= $data['Username'];
		$Password	= $data['Password'];
		$Keterangan	= $data['Keterangan'];
	}
	else{
		$Username	= "";
		$Passwrod	= "";
		$Keterangan	= "";
	};
?>
<h3>Edit User</h3>

<form method="post" action="prosesedituser.php">
<input type="hidden" name="Id" value="<?php echo $Id; ?>" >
<table>
<tr>
	<td>Username</td>
	<td>:</td>
	<td width="200"><input type="text" name="Username" value="<?php echo $Username; ?>"></td>
<tr>
<tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="password" name="Password" value="<?php echo $Password; ?>"></td>
<tr>
<tr>
	<td>Keterangan</td>
	<td>:</td>
	<td><input type="text" name="Keterangan" value="<?php echo $Keterangan; ?>"></td>
<tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" value="Simpan">&nbsp;&nbsp;<input type="reset" value="Reset"></td>
</table>
</form>

<?php
	include 'footer.php';
?>