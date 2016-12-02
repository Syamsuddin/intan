<?php
#######################################################################################################
######  Nama file : tampiljadwalharian.php							#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl										#######
######  Dibuat    : 29 Oktober 2016, 09:42 WITA							#######
######  Deskripsi : berisi tentang petunjuk pemakain aplikasi					#######
#######################################################################################################
		
	include 'config.php';
	$title	= 'Jadwal Harian Bupati';
	include 'header.php';
	$ftgl   ="'%h:%i'";
	
	$tgl	= date("Y-m-d");
	$sql	= "select TIME_FORMAT(Waktu, '%H:%i' ) as Jam, Nama, Tempat, Sifat, Teruntuk, Dihadiri from kegiatan where Tanggal=\"".$tgl."\" order by waktu";
	$query	= mysqli_query($db_link,$sql);
	
?>


<h3>Jadwal Kegiatan Pimpinan Daerah</h3>
<p>Hari : <?php echo $dayList[$day];?>, Tanggal : <?php echo ubahtanggal2($tgl); ?> </p>
<table width="972" border="1" >
  <tr align="center" bgcolor="#006699">
    <td width="35" >No</td>
    <td width="83" >Waktu</td>
    <td width="350" >Nama Kegiatan</td>
    <td width="300" >Tempat</td>
    <td width="125">Sifat</td>
    <td width="50">Teruntuk</td>
    <td width="50">Dihadiri</td>
  </tr>
 
<?php
    if (mysqli_num_rows($query)>0) {
        $no = 0;
	while($data	= mysqli_fetch_array($query)){ 
	$no++;
	if ($number % 2 == 0) {
	   echo '<tr bgcolor="#cccccc">';
	} else {
	   echo '<tr bgcolor="#ffffff">';
	};
?>

    <td><?php echo $no; ?></td>
    <td><?php echo $data['Jam'].' wita'; ?></td>
    <td><?php echo $data['Nama']; ?></td>
    <td><?php echo $data['Tempat']; ?></td>
    <td align="center"><?php echo $Sifat[$data['Sifat']-1]; ?></td>
    <td align="center"><?php echo $Pejabat[$data['Teruntuk']-1]; ?></td>
    <td align="center"><?php echo $Pejabat[$data['Dihadiri']-1]; ?></td>
  </tr>
<?php
	 }  
     } else {
        echo '<tr><td align="center" colspan="9">Tidak ada jadwal hari ini.</td></tr>';
    
     }
     
	 ?>  
</table>
<br />
<form method="POST" action="cetakjadwalbupati.php"><input type="hidden" name="tgl" value="<?php echo $tgl; ?>"><input type="submit" value="Cetak Jadwal"></form>
<?php
	include 'footer.php';
?>
