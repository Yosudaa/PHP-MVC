<?php 
include_once 'model.php';
session_start();
error_reporting(0);
$eq = new yosuda;
$aksi = $_GET['aksi'];
$table = $_GET['table'];
// Petik kosong, berfungsi menutup error data yang akan diterima function
if ($aksi == "add") {
	if($table == "barang"){
		$cek = $eq->add($_POST['kd_brg'],$_POST['nm_brg'],$_POST['stok'],$_POST['harga'],'');
	}else{
		$cek = $eq->add($_POST['nik'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$_POST['no_hp']);
	}

	if($cek){
		echo "<script>
		alert('Data Ditambahkan');
		window.location.href = 'index.php?page=".$_GET['table']."'; </script>";
	}
}
elseif ($aksi == "edit") {
	if($table == "barang"){
		$cek = $eq->edit($_GET['kd_brg'],$_POST['nm_brg'],$_POST['stok'],$_POST['harga'],'','');
	}else{
		$cek = $eq->edit($_GET['id'],$_POST['nik'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$_POST['no_hp']);
	}

	if($cek){
		echo "<script>
		alert('Data Diupdate');
		window.location.href = 'index.php?page=".$_GET['table']."'; </script>";
	}
}
elseif ($aksi == "delete") {
	if($table == "barang"){
		$eq->delete($_GET['kd_brg']);
	}else{
		$eq->delete($_GET['id']);
	}

	header("location:index.php?page=".$_GET['table']."");
}
elseif ($aksi == "rate") {
	$kd_brg = $_GET['kd_brg'];
	$eq->rating($_SESSION['id'],$_GET['kd_brg'],$_GET['value']);
	header("location:index.php?page=ulasan&table=barang&kd_brg=$kd_brg");
}
elseif ($aksi == "log") {
	if($_GET['ac']=="login"){
		$cek = $eq->log($_POST['user'],$_POST['pass'] ,'');
		// return data dari function bernilai false, trigger alert
		if(!$cek){ ?>
			<script type="text/javascript">
				alert("Username atau Password salah");
				history.back();
			</script>';
<?php	}else{
			header("location:index.php");		
		}
		
	}else{
		$eq->log($_POST['nama'],$_POST['user'],$_POST['pass']);
		echo
		"<script>
			alert('Selamat Datang, ".$_POST['nama']."');
			window.location.href = 'index.php?page=login&ac=login';
		</script>";

	}
}
elseif ($aksi == "logout") {
	$eq->logout();
	header("location:index.php");
}

 ?>