<?php
###########################################################################
######  Nama file : TampilJadwal.php								#######
######  Programmer: syamsuddin										#######
######  Lisensi	  : gpl												#######
######  Dibuat    : 29 Oktober 2016, 11:50 WITA						#######
###########################################################################

include 'config.php';
$title	= 'Daftar Jadwal';
include 'header.php';

$sql	= 'select * from kegiatan order by Tanggal, Waktu';
$query	= mysqli_query($db_link,$sql);
	
?>
 
<h2><strong>Daftar Kegiatan</strong></h2>
<?php if (isset($_SESSION['login_user'])){ ?>
	<p align="right"><a href="tambahjadwal.php"><img src="img/add.jpg"></a></p>
<?php } ?>
<table border="1" cellpadding="5" cellspacing="0" align="center">
  <tr bgcolor="#006699">
    <strong>
    <td width="70" height="29" align="center" valign="middle" ><font color="#fff">Hari</font></td>
    <td width="50" align="center" valign="middle" ><font color="#fff">Tanggal</font></td>
    <td width="110" align="center" valign="middle" ><font color="#fff">Waktu</font></td>
    <td width="400" align="center" valign="middle" ><font color="#fff">Kegiatan</font></td>
    <td width="200" align="center" valign="middle" ><font color="#fff">Tempat</font></td>
    <?php if (isset($_SESSION['login_user'])){ ?>
	<td width="70" align="center" valign="middle" ><font color="#fff">Tindakan</font></td>
    <?php } ?>
  </tr>
	</strong>
<?php
	while($data	= mysqli_fetch_array($query)){ 
?>
  <tr>
    <td p align="center"><?php echo $Hari[$data['Hari']-1]; ?></td>
    <td p align="left" ><?php echo ubahTanggal2($data['Tanggal']); ?></td>
    <td p align="left" ><?php echo substr($data['Waktu'],0,5).' Wita'; ?></td>
    <td p align="left" ><?php echo $data['Nama']; ?></td>
    <td p align="left" ><?php echo $data['Tempat']; ?></td>
    <?php if (isset($_SESSION['login_user'])){ ?>
	<td p align="center" >
	<a href="editjadwal.php?Id=<?php echo $data['Id']; ?>" title="Ubah jadwal kegiatan ini!" ><img src="img/edit.jpg"></a> 
	<a href="deletejadwal.php?Id=<?php echo $data['Id']; ?>" title="Hapus jadwal kegiatan ini!" onclick="return confirm('Apakah jadwal kegiatan ini mau dihapus?');"><img src="img/delete.jpg"></a>
	</td>
    <?php } ?>
  </tr>
<?php
}
?>  
</table>
<br />
<form method="POST" action="cetakjadwal.php"><input type="submit" value="Cetak Jadwal"></form>
<br />
<?php if (isset($_SESSION['login_user'])){ ?>
Keterangan&nbsp;:&nbsp;<img src="img/add.jpg" >&nbsp;=&nbsp;Jadwal Baru.&nbsp;&nbsp;<img src="img/edit.jpg" >&nbsp;=&nbsp;Ubah Jadwal.&nbsp;&nbsp;<img src="img/delete.jpg" >&nbsp;=&nbsp;Hapus Jadwal.
<?php } ?>
<?php
  include 'footer.php';
 ?>
