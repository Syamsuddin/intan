<?php
#######################################################################
######  Nama file : edijadwal.php				#######
######  Programmer: syamsuddin					#######
######  Lisensi	  : gpl						#######
######  Dibuat    : 30 Oktober 2016, 06:21 WITA			#######
######  Deskripsi : berisi halaman edit jadwal kegiatan yg ada  #######
#######################################################################
	include 'config.php';
	$title  = 'Edit Jadwal';
	include 'header.php';

	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};
	
	if(isset($_GET['Id'])){
		$Id	= $_GET['Id'];
		$query	= mysqli_query($db_link,'select * from kegiatan where Id = "'.$Id.'"');
		$data  	= mysqli_fetch_array($query);
		
		$Nama		= $data['Nama'];
		$Tanggal	= ubahTanggal2($data['Tanggal']);
		$Hari		= $data['Hari'];
		$Waktu		= $data['Waktu'];
		$Tempat		= $data['Tempat'];
		$Sifat		= $data['Sifat'];
		$Untuk		= $data['Untuk'];
		$Dihadiri	= $data['Dihadiri'];
	}
	else{
		$Nama		= '';
		$Tanggal	= '';
		$Hari		= '';
		$Waktu		= '';
		$Tempat		= '';
		$Sifat		= '';
		$Untuk		= '';
		$Dihadiri	= '';
	};
	
	
?>

<h3>Input Jadwal Kegiatan </h3>
		<form method="post" action="prosesubahjadwal.php">
		<input type="hidden" name="Id" value="<?php echo $Id; ?>">
            <table width="682" border="1">
              <tr>
                <td width="151">Nama Kegiatan </td>
                <td width="16">:</td>
                <td width="493"><label>
                  <input name="Nama" type="text" id="Nama" size="80" value="<?php echo $Nama; ?>">
                </label></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><label>
                  <input name="Tanggal" type="text" id="tanggal" maxlength="10" value="<?php echo $Tanggal; ?>" >&nbsp; Format : (dd/mm/yyyy), contoh: 31/10/2016
                </label></td>
              </tr>readonly
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td><label>
                  <select name="Hari" id="Hari">
                    <option value="1" <?php if($Hari==1){ echo 'selected';} ?>>Senin</option>
                    <option value="2" <?php if($Hari==2){ echo 'selected';} ?>>Selasa</option>
                    <option value="3" <?php if($Hari==3){ echo 'selected';} ?>>Rabu</option>
                    <option value="4" <?php if($Hari==4){ echo 'selected';} ?>>Kamis</option>
                    <option value="5" <?php if($Hari==5){ echo 'selected';} ?>>Jumat</option>
                    <option value="6" <?php if($Hari==6){ echo 'selected';} ?>>Sabtu</option>
                    <option value="7" <?php if($Hari==7){ echo 'selected';} ?>>Minggu</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><input name="Waktu" type="text" id="Waktu" maxlength="10" value="<?php echo $Waktu; ?>">Wita, &nbsp; Format : ((hh:mm:ss), contoh 07:30:00</td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td><input name="Tempat" type="text" id="Tempat" size="80" value="<?php echo $Tempat; ?>"></td>
              </tr>
              <tr>
                <td>Sifat</td>
                <td>:</td>
                <td><label>
                  <select name="Sifat" id="Sifat">
                    <option value="1" <?php if($Sifat==1){ echo 'selected';} ?>>Formal</option>
                    <option value="2" <?php if($Sifat==2){ echo 'selected';} ?>>Semi Formal</option>
                    <option value="3" <?php if($Sifat==3){ echo 'selected';} ?>>Non Formal</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Untuk</td>
                <td>:</td>
                <td><label>
                  <select name="Untuk" id="Untuk">
                    <option value="1" <?php if($Untuk==1){ echo 'selected';} ?>>Bupati</option>
                    <option value="2" <?php if($Untuk==2){ echo 'selected';} ?>>Wakil Bupati</option>
                    <option value="3" <?php if($Untuk==3){ echo 'selected';} ?>>Sekda</option>
                    <option value="4" <?php if($Untuk==4){ echo 'selected';} ?>>Lainnya</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Dihadiri oleh </td>
                <td>:</td>
                <td><select name="Dihadiri" id="Dihadiri">
                  <option value="1" <?php if($Dihadiri==1){ echo 'selected';} ?>>Bupati</option>
                  <option value="2" <?php if($Dihadiri==2){ echo 'selected';} ?>>Wakil Bupati</option>
                  <option value="3" <?php if($Dihadiri==3){ echo 'selected';} ?>>Sekda</option>
                  <option value="4" <?php if($Dihadiri==4){ echo 'selected';} ?>>Lainnya</option>
                                </select></td>
              </tr>
               <tr>
                <td>Keterangan </td>
                <td>:</td>
                <td><input name="Keterangan" type="text" id="Nama" size="80" value="<?php echo $Keterangan; ?>"></td>
              </tr>
              <tr>
                <td colspan="3"><div align="right">
                  <label>
                  <input type="submit" name="Submit" value="Simpan"> &nbsp; <input name="" type="reset" value="Batal">
                  </label>
                </div></td>
              </tr>
            </table>
			</form>
			
<?php
	include 'footer.php';
?>