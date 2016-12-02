<?php
#######################################################################################################
######  Nama file : CetakJadwal.php								#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl										#######
######  Dibuat    : 23 Oktober 2016, 08:12 WITA							#######
#######################################################################################################

include 'config.php';
$sql	= 'select * from kegiatan';
$query	= mysqli_query($db_link,$sql);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=jadwal.xls");	
?>
 
<h2><strong>Daftar Kegiatan</strong></h2>

<table border="1" cellpadding="5" cellspacing="0" align="center">
  <tr bgcolor="#6699ff">
    <strong>
    <td width="50" height="29" align="center" valign="middle" ><font color="#fff">No</font></td>
    <td width="150" align="center" valign="middle" ><font color="#fff">Hari/Tanggal</font></td>
    <td width="100" align="center" valign="middle" ><font color="#fff">Waktu</font></td>
    <td width="400" align="center" valign="middle" ><font color="#fff">Kegiatan</font></td>
    <td width="350" align="center" valign="middle" ><font color="#fff">Tempat</font></td>
    <td width="140" align="center" valign="middle" ><font color="#fff">Keterangan</font></td>
  </tr>
	</strong>
<?php
	$no	= 0;
	while($data	= mysqli_fetch_array($query)){ 
	$no++;
?>
  <tr>
    <td p align="center"><?php echo $no; ?></td>
    <td p align="left" ><?php echo $Hari[$data['Hari']-1].', '.ubahTanggal2($data['Tanggal']); ?></td>
    <td p align="left" ><?php echo substr($data['Waktu'],0,5).' Wita'; ?></td>
    <td p align="left" ><?php echo $data['Nama']; ?></td>
    <td p align="left" ><?php echo $data['Tempat']; ?></td>
    <td p align="left" ><?php echo $data['Keterangan']; ?></td>
  </tr>
<?php
}
?>  
</table>


