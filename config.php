<?php
#######################################################################################
######  Nama file : config.php													#######
######  Programmer: syamsuddin													#######
######  Lisensi	  : gpl															#######
######  Dibuat    : 29 Oktober 2016, 21:58 WITA									#######
######  Deskripsi : berisi konfigurasi umum										#######
#######################################################################################

/* Konfigurasi Umum Sistem     */

$Footer	= 'Copyright © 2016 by Sub Bag Humas dan Perjalanan – All Right Reserved';
$Hari 	= array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
$Sifat	= array('Formal','Semi Formal','Non Formal');
$Pejabat= array('Bupati','Wakil Bupati','Sekda','Lainnya');

/* Konfigurasi Database */
$db_host	= 'localhost'; 
$db_usn		= 'u0420349_intan'; 
$db_pwd		= 'eeweew20162017'; 
$db_name	= 'u0420349_intan'; 
$db_link	= mysqli_connect($db_host,$db_usn,$db_pwd,$db_name);

function ubahTanggal($tanggal){
	$pisah = explode('/',$tanggal);
	$larik = array($pisah[2],$pisah[1],$pisah[0]);
	$satukan = implode('-',$larik);
	return $satukan;
};

function ubahTanggal2($tanggal){
	$hasil = date("d/m/Y", strtotime($tanggal));
	return $hasil;
};

function hari($tgl){
	$hasil= date('N', strtotime($tgl));
	return $hasil;
};

function hariini($tgl) {
	$NamaHari[1] = "Senin";
	$NamaHari[2] = "Selasa";
	$NamaHari[3] = "Rabu";
	$NamaHari[4] = "Kamis";
	$NamaHari[5] = "Jumat";
	$NamaHari[6] = "Sabtu";
	$NamaHari[7] = "Minggu";
	$h = $NamaHari[date('N',$tgl)];
	
	return $h;
};

function tanggalini(){
	$tgl = date('d/m/Y');
	return $tgl;
};

function ahari($tgl) {
    $nhari = date('N', $tgl);
    $shari = $NamaHari[$nhari];
    return $shari;
};

function atanggal($tgl) {
   $t = date('d/m/Y', $tgl);
   return $t;
};

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

?>
