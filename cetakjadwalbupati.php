<?php
#######################################################################################################
######  Nama file : cetakjadwalbupati.php							#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl										#######
######  Dibuat    : 23 Oktober 2016, 09:42 WITA							#######
######  Deskripsi : berisi tentang petunjuk pemakain aplikasi					#######
#######################################################################################################
	
	include 'config.php';	
	$tgl	= date("Y-m-d");
	$sql	= 'select * from kegiatan where Tanggal="'.$tgl.'"';
	$query	= mysqli_query($db_link,$sql);
	
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=jadwalharian.xls");	
?>

<h3>Jadwal Kegiatan Pimpinan Daerah</h3>
<p>Hari : <?php echo hariini($tgl);?>, Tanggal : <?php echo ubahtanggal2($tgl); ?> </p>
<table width="972" border="1" >
  <tr align="center" bgcolor="#006699">
    <td width="35" >No</td>
    <td width="83" >Waktu</td>
    <td width="338" >Nama Kegiatan</td>
    <td width="138" >Tempat</td>
    <td width="58">Bupati</td>
    <td width="56">Wakil Bupati </td>
    <td width="59">Sekda</td>
    <td width="56">Pejabat Lain </td>
    <td width="175" >Keterangan</td>
  </tr>
 
<?php
    if (mysqli_num_rows($query)>0) {
        $no = 0;
	while($data	= mysqli_fetch_array($query)){ 
	$no++;
	
?>

  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $data['Waktu']; ?></td>
    <td><?php echo $data['Nama']; ?></td>
    <td><?php echo $data['Tempat']; ?></td>
    <td align="center">&nbsp;<?php if ($data['Dihadiri']==1){echo "1";}; ?></td>
    <td align="center">&nbsp;<?php if ($data['Dihadiri']==2){echo "1";}; ?></td>
    <td align="center">&nbsp;<?php if ($data['Dihadiri']==3){echo "1";}; ?></td>
    <td align="center">&nbsp;<?php if ($data['Dihadiri']==4){echo "1";}; ?></td>
    <td>&nbsp;</td>
  </tr>
<?php
	 }  
     } else {
        echo '<tr><td align="center" colspan="9">Tidak ada jadwal hari ini.</td></tr>';  
     }
	 ?>  
</table>
