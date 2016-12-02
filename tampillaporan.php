<?php
###########################################################################
######  Nama file : TampilLaporan.php								#######
######  Programmer: syamsuddin										#######
######  Lisensi	  : gpl												#######
######  Dibuat    : 20 Nopember 2016, 08:23 WITA						#######
###########################################################################

include 'config.php';
$title	= 'Laporan Bulanan';
include 'header.php';

if(isset($_POST['Bulan'])) {
    $Bulan = $_POST['Bulan'];
    $Tahun = $_POST['Tahun'];
} else {
	$Bulan = 12;
	$Tahun = 2016;
};

$sql	= 'select * from kegiatan where month(Tanggal)='.$Bulan.' and year(Tanggal)='.$Tahun.' order by Tanggal, Waktu';
$query	= mysqli_query($db_link,$sql);
	
?>
 
<h2><strong>Laporan Rekap Kegiatan</strong></h2>

<p align="right">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<select name="Bulan" id="Bulan">
                <option value="1"  <?php if ($Bulan==1) { echo "selected";} ?>>Januari</option>
                <option value="2"  <?php if ($Bulan==2) { echo "selected";} ?>>Februari</option>
                <option value="3"  <?php if ($Bulan==3) { echo "selected";} ?>>Maret</option>
                <option value="4"  <?php if ($Bulan==4) { echo "selected";}?>>April</option>
                <option value="5"  <?php if ($Bulan==5) { echo "selected";} ?>>Mei</option>
                <option value="6"  <?php if ($Bulan==6) { echo "selected";} ?>>Juni</option>
                <option value="7"  <?php if ($Bulan==7) { echo "selected";} ?>>Juli</option>
                <option value="8"  <?php if ($Bulan==8) { echo "selected";} ?>>Agustus</option>
                <option value="9"  <?php if ($Bulan==9) { echo "selected";} ?>>September</option>
                <option value="10" <?php if ($Bulan==10){ echo "selected";} ?>>Oktober</option>
                <option value="11" <?php if ($Bulan==11){ echo "selected";} ?>>Nopember</option>
                <option value="12" <?php if ($Bulan==12){ echo "selected";} ?>>Desember</option>
</select> 
<select name="Tahun" id="Tahun">
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	<option value="2020">2020</option>
</select> &nbsp;&nbsp;
<input type="Submit" value="Tampilkan">
</form>
</p>
<table border="1" cellpadding="5" cellspacing="0" align="center">
  <tr bgcolor="#006699">
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
	 
	 $sql 		= 'SELECT SUM(IF(Dihadiri=1,1,0)) AS JLHBUPATI FROM kegiatan WHERE month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhbupati 	= $data['JLHBUPATI']; // Jumlah Dihadiri Bupati

$sql 		= 'SELECT SUM(IF(Dihadiri=2,1,0)) AS JLHWABUP FROM kegiatan WHERE month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhwabup 	= $data['JLHWABUP']; // Jumlah Dihadiri Wakil Bupati

$sql 		= 'SELECT SUM(IF(Dihadiri=3,1,0)) AS JLHSEKDA FROM kegiatan WHERE month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhsekda 	= $data['JLHSEKDA']; // Jumlah Dihadiri Sekda

$sql 		= 'SELECT SUM(IF(Dihadiri=4,1,0)) AS JLHLAINNYA FROM kegiatan WHERE month(Tanggal)='.$Bulan;
$query		= mysqli_query($db_link,$sql);
$data 		= mysqli_fetch_array($query);
$jlhlainnya 	= $data['JLHLAINNYA']; // Jumlah Dihadiri Sekda

?>  
<tr>
  	<td colspan="5" align="center">Jumlah</td>
  	<td align="center"><?php echo $jlhbupati; ?></td>
   	<td align="center"><?php echo $jlhwabup; ?></td>
    	<td align="center"><?php echo $jlhsekda; ?></td>
     	<td align="center"><?php echo $jlhlainnya; ?></td>
</tr>
<?php
   } else {
      echo '<td colspan=9 align=center>Tidak ada jadwal bulan ini.</td>';
       $jlhbupati = 0; 
       $jlhwabup  = 0;
       $jlhsekda  = 0;
       $jlhlainnya= 0;
   };
?>

</table>
<br/>
<form method="post" action="cetaklaporan.php">
	<input type="submit" value="Cetak Laporan Bulanan">
	<input type="hidden" name="Bulan" value="<?php echo $Bulan; ?>">
</form>
<?php
  include 'footer.php';
?>
