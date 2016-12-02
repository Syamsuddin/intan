<?php
session_start();
##########################################################################################################
######  Nama file : header.php									   #######
######  Programmer: syamsuddin									   #######
######  Lisensi	  : gpl										   #######
######  Dibuat    : 12 September 2016, 14:32 WITA						   #######
######  Deskripsi : berisi format bagian atas halmaan/ header					   #######
##########################################################################################################
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INTAN - <?php echo $title; ?></title>
  <link rel="stylesheet" href="inc/style.css"/>
  <link href="inc/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="inc/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="inc/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="inc/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="inc/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
   $(document).ready(function(){
    /*$("#tanggal").datepicker({ */
     $("#tanggal").datepicker({
     dateFormat: 'dd/mm/yy'
    })
   })
  </script>

</head>
<body background="img/bgimage.jpg">
    <br />
<div class="wrap">
    <div class="header"></div>
    <div class="menu">
        <ul class="dropmenu">
			<li><a href="index.php">Beranda</a></li>
			<li><a href="">Profil</a>
				<ul>
					<li><a href="profil.php">Sekilas Profil</a></li>
					<li><a href="visimisi.php">Visi dan Misi</a></li>
					<li><a href="organisasi.php">Struktur Organisasi</a></li>
					<li><a href="tupoksi.php">Tupoksi</a></li>
					<li><a href="publikasi.php">Publikasi</a></li>
				</ul>
			</li>
			<li><a href="">Sistem Informasi</a>
				<ul>
					<li><a href="tampiluser.php">User</a></li>
					<li><a href="tampiljadwal.php">Jadwal Kegiatan</a></li>
					<li><a href="tampillaporan.php">Laporan Bulanan</a></li>
					<li><a href="tampiljadwalharian.php">Lihat Jadwal Harian</a></li>
				</ul>
			</li>
			<li><a href="jadwalbupati.php">Jadwal Harian Bupati</a>
			</li>
			<li><a href="">Galeri</a>
				<ul>
					<li><a href="galeryfoto.php">Galery Foto</a></li>
					<li><a href="galeryvideo.php">Galery Video</a></li>
				</ul>
			</li>
			<li><a href="">Bantuan</a>
				<ul>
						<li><a href="tentang.php">Tentang Kami</a></li>
						<li><a href="juknis.php">Petunjuk Pemakaian</a></li>
				</ul>
			</li>
			<?php if (isset($_SESSION['login_user'])){ ?>
			<li><a href="logout.php">Logout</a></li>
			<?php } else { ?>
			<li><a href="login.php">Login</a></li>
			<?php } ?>
		</ul>
    </div>
    
<?php
	
	$tgl	= date("Y-m-d");
	$tgl2   = date("d/m/Y");
	
       $day = date('D', strtotime($tgl));
       $dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
    );
    	
	$sql	= "select TIME_FORMAT(Waktu, '%H:%i' ) as Jam, Nama, Tempat, Sifat, Teruntuk, Dihadiri from kegiatan where (Tanggal=\"".$tgl."\" and Dihadiri=\"1\") order by waktu";
	$query	= mysqli_query($db_link,$sql);
	//$query	= mysqli_query($db_link,$sql);
	$rowcount = mysqli_num_rows($query);
	if ($rowcount == 0) { 
		$pesan = 'Jadwal Kegiatan Bupati hari '.$dayList[$day].' tanggal '.$tgl2.' tidak ada kegiatan.';
	}
	else {
	$pesan = 'Jadwal Kegiatan Bupati Hulu Sungai Selatan hari '.$dayList[$day].' tanggal '.$tgl2;
		while ($data = mysqli_fetch_array($query)) {
			$pesan = $pesan.' pukul '.$data['Jam'].' wita : '.$data['Nama'].'. ';
		
		}
	
	}
	

?>    

	<div class="marquee">
    <marquee> <?php echo $pesan;  ?>    </marquee>
    </div>
    <div class="main">
        <div class="content">