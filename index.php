<!DOCTYPE html>
<html>
<head>
	<title>Belajar MVC</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php session_start(); error_reporting(0); ?>
</head>
<body>
	<div class="content">
		<header>
			<h1 class="judul">Belajar MVC</h1>
			<h3 class="deskripsi">Aplikasi Data Barang & Data Karyawan</h3>
		</header>

		<div class="menu">
			<ul>
				<li class="dropdown"><a href="index.php?page=home">Home</a></li>
				<li class="dropdown"><a href="index.php?page=barang">Data Barang</a></li>
				<li class="dropdown"><a href="index.php?page=karyawan">Data Karyawan</a></li>
<?php if (!$_SESSION['id']){ ?>
				<li class="dropdown kanan"><a href="index.php?page=login&ac=login">Login</a></li>
<?php }else{ ?>
				<li class="dropdown kanan"><a href="control.php?aksi=logout">Logout</a></li>
<?php } ?>
			</ul>
		</div>
	
	<?php include 'route.php'; ?>

	<footer>
		<hr>
		<h4>Copyright &copy; Yogi Surya Perdana. All Right Reserved.</h4>
	</footer>

</div>

</body>
</html>

	