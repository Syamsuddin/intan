<?php
##############################################################################################################
######  Nama file : cetakLaporan.php									#######
######  Programmer: syamsuddin										#######
######  Lisensi	  : gpl											#######
######  Dibuat    : 20 Nopember 2016, 08:23 WITA							#######
##############################################################################################################

include 'config.php';
$Bulan	= $_POST['Bulan'];  


$sql	= 'select * from kegiatan where month(Tanggal)='.$Bulan;
$query	= mysqli_query($db_link,$sql);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporanbulana.xls");
	
?>
 
<h2><strong>Laporan Bulanan Kegiatan</strong></h2>
<br />
<table border="1" cellpadding="5" cellspacing="0" align="center">
  <tr bgcolor="#3399ff">
    <strong>
    <td width="50" height="29" align="center" valign="middle" ><font color="#fff">Hari</font></td>
    <td width="70" align="center" valign="middle" ><font color="#fff">Tanggal</font></td>
    <td width="110" align="center" valign="middle" ><font color="#fff">Waktu</font></td>
    <td width="400" align="center" valign="middle" ><font color="#fff">Kegiatan</font></td>
    <td width="200" align="center" valign="middle" ><font color="#fff">Tempat</font></td>
    <td width="70" align="center" valign="middle" ><font color="#fff">Bupati</font></td>
    <td width="70" align="center" valign="middle" ><font color="#fff">Wakil Bupati</font></td>
    <td width="70" align="center" valign="middle" ><font color="#fff">Sekda</font></td>
    <td width="70" align="center" valign="middle" ><font color="#fff">Pejabat Lainnya</font></td>
  </tr>
	</strong>
<?php
	$jlhbupati	= 0;
	$jlhwabup 	= 0;
	$jlhsekda 	= 0;
	$jlhlainnya 	= 0;
	$no = 0;
	if (mysqli_num_rows($query)>0) {
	while($data	= mysqli_fetch_array($query)){ 
	$no++;
?>
  <tr>
    <td p align="center"><?php echo $no ; ?></td>
    <td p align="left" ><?php echo $Hari[$data['Hari']-1].'<br/>'.ubahTanggal2($data['Tanggal']); ?></td>
    <td p align="left" ><?php echo substr($data['Waktu'],0,5).' Wita'; ?></td>
    <td p align="left" ><?php echo $data['Nama']; ?></td>
    <td p align="left" ><?php echo $data['Tempat']; ?></td>
    <td p align="center" ><?php if ($data['Dihadiri']==1){echo "1"; $jlhbupati++;}  ?></td>
    <td p align="center" ><?php if ($data['Dihadiri']==2){echo "1"; $jlhwabub++;}   ?></td>
    <td p align="center" ><?php if ($data['Dihadiri']==3){echo "1"; $jlhsekda++;}   ?></td>
    <td p align="center" ><?php if ($data['Dihadiri']==4){echo "1"; $jlhlainnya++;} ?></td>
  </tr>
<?php 
	}; 
   } else {
      echo '<td colspan=9 align=center>Tidak ada jadwal bulan ini.</td>';
   };
$sql 		= 'SELECT SUM(IF(Dihadiri=1,1,0)) AS JLHBUPATI FROM kegiatan where month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhbupati 	= $data['JLHBUPATI']; // Jumlah Dihadiri Bupati

$sql 		= 'SELECT SUM(IF(Dihadiri=2,1,0)) AS JLHWABUP FROM kegiatan  where month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhwabup 	= $data['JLHWABUP']; // Jumlah Dihadiri Wakil Bupati

$sql 		= 'SELECT SUM(IF(Dihadiri=3,1,0)) AS JLHSEKDA FROM kegiatan where month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhsekda 	= $data['JLHSEKDA']; // Jumlah Dihadiri Sekda

$sql 		= 'SELECT SUM(IF(Dihadiri=4,1,0)) AS JLHLAINNYA FROM kegiatan where month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhlainnya 	= $data['JLHLAINNYA']; // Jumlah Dihadiri Sekda

?>  
<tr>
  	<td colspan="5" align="center">Jumlah</td>
  	<td align="center"><?php echo $jlhbupati; ?></td>
   	<td align="center"><?php echo $jlhwabub; ?></td>
    	<td align="center"><?php echo $jlhsekda; ?></td>
     	<td align="center"><?php echo $jlhlainnya; ?></td>
</tr>
</table>