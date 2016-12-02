<?php

###############################################################################################
######  Nama file : TampilJadwal.php							#######
######  Programmer: syamsuddin								#######
######  Lisensi	  : gpl									#######
######  Dibuat    : 29 Oktober 2016, 11:50 WITA						#######
###############################################################################################

include 'config.php';
$title	= 'Daftar User';
include 'header.php';

$sql	= 'select * from user';
$query	= mysqli_query($db_link,$sql);

?>
<center>
<h3>Daftar User Aplikasi</h3>
<?php if (isset($_SESSION['login_user'])){ ?>
	<p align="center"><a href="adduser.php"><img src="img/add.jpg"></a></p>
<?php } ?>
<table border="0">
<tr bgcolor="#006666">
	<td>No</td>
	<td>Username</td>
	<td>Password</td>
	<?php if (isset($_SESSION['login_user'])){ ?>
	 <td>Action</td>
	<?php } ?>
<tr>
<?php
	$no = 0;
	while($data= mysqli_fetch_array($query)){ 
	$no++;
?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $data['Username']; ?></td>
	<td><?php echo $data['Keterangan']; ?></td>
	<?php if (isset($_SESSION['login_user'])){ ?>
	<td><a href="edituser.php?id=<?php echo $data['Id']; ?>"><img src="img/edit.jpg" ></a>&nbsp;&nbsp;
	    <a href="deleteuser.php?id=<?php echo $data['Id']; ?>" onclick="return confirm('Apakah data user <?php echo $data['Username']; ?> mau dihapus?');"><img src="img/delete.jpg" ></a>
	</td>
	<?php } ?>
<tr>
<?php
	}
?>
</table>
<br />
<?php if (isset($_SESSION['login_user'])){ ?>
Keterangan&nbsp;:&nbsp;<img src="img/add.jpg" >&nbsp;=&nbsp;Jadwal Baru.&nbsp;&nbsp;<img src="img/edit.jpg" >&nbsp;=&nbsp;Ubah Jadwal.&nbsp;&nbsp;<img src="img/delete.jpg" >&nbsp;=&nbsp;Hapus Jadwal.
<?php } ?>
</center>

<?php
	include 'footer.php';
?>