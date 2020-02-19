<?php 

if (isset($_GET['page'])) {
	$page = $_GET['page'];

	switch ($page) {
		case 'home':
			include 'page/home.php';
			break;

		case 'barang':
			include 'page/barang.php';
			break;

		case 'ulasan':
			include 'page/ulasan.php';
			break;

		case 'karyawan':
			include 'page/karyawan.php';
			break;

		case 'form_barang':
			if ($_SESSION['id']!=false) {
				include 'page/form_barang.php';
			}else{
				echo "<h2 align='center'>Anda Harus Login Terlebih Dahulu</h2>";
			}
			
			break;

		case 'form_karyawan':
			if ($_SESSION['id']!=false) {
				include 'page/form_karyawan.php';
			}else{
				echo "<h2 align='center'>Anda Harus Login Terlebih Dahulu</h2>";
			}
			break;

		case 'login':
			include 'page/form_user.php';
			break;
		
		default:
			echo "<h2 align='center'>Halaman tidak ditemukan</h2>";
			break;
	}
}
else{
	include 'page/home.php';
}



 ?>