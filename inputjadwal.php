<?php
#######################################################################
######  Nama file : inputjadwal.php								#######
######  Programmer: syamsuddin									#######
######  Lisensi	  : gpl											#######
######  Dibuat    : 29 Oktober 2016, 09:42 WITA					#######
######  Deskripsi : berisi halaman input jadwal kegiatan		#######
#######################################################################
	include 'config.php';
	$title  = 'Input Jadwal';
	include 'header.php';
	
	if (!isset($_SESSION['login_user'])){
	header('location:login.php');
	};
?>


<h3>Input Jadwal Kegiatan </h3>
		<form method="post" action="prosesinputjadwal.php">
            <table width="682" border="1">
              <tr>
                <td width="151">Nama Kegiatan </td>
                <td width="16">:</td>
                <td width="493"><label>
                  <input name="Nama" type="text" id="Nama" size="80">
                </label></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><label>
                  <input name="Tanggal" type="text" id="tanggal" maxlength="10">
                </label></td>
              </tr>
              <tr>
                <td>Hari</td>
                <td>:</td>
                <td><label>
                  <select name="Hari" id="Hari">
                    <option value="1" selected>Senin</option>
                    <option value="2">Selasa</option>
                    <option value="3">Rabu</option>
                    <option value="4">Kamis</option>
                    <option value="5">Jumat</option>
                    <option value="6">Sabtu</option>
                    <option value="7">Minggu</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><input name="Waktu" type="text" id="Waktu" maxlength="10"></td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>:</td>
                <td><input name="Tempat" type="text" id="Tempat" size="80"></td>
              </tr>
              <tr>
                <td>Sifat</td>
                <td>:</td>
                <td><label>
                  <select name="Sifat" id="Sifat">
                    <option value="1" selected>Formal</option>
                    <option value="2">Semi Formal</option>
                    <option value="3">Non Formal</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Untuk</td>
                <td>:</td>
                <td><label>
                  <select name="Untuk" id="Untuk">
                    <option value="1" selected>Bupati</option>
                    <option value="2">Wakil Bupati</option>
                    <option value="3">Sekda</option>
                    <option value="4">Lainnya</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Dihadiri oleh </td>
                <td>:</td>
                <td><select name="Dihadiri" id="Dihadiri">
                  <option value="1" selected>Bupati</option>
                  <option value="2">Wakil Bupati</option>
                  <option value="3">Sekda</option>
                  <option value="4">Lainnya</option>
                                </select></td>
              </tr>
              <tr>
                <td>Keterangan </td>
                <td>:</td>
                <td><input name="Keterangan" type="text" id="Nama" size="80"></td>
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