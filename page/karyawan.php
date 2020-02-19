<h1 align="center">Data Karyawan</h1>
<table align="center" width="80%">
	<tr>
		<td width="20%">
			<a href="index.php?page=form_karyawan&ac=add"><button>Tambah Data</button></a>
		</td>
		<form action="" method="post">
		<td align="right"><input type="text" name="cari" placeholder="Cari Nama Karyawan"></td>
		<td width="5%"><input type="submit" name="submit" value="Cari"></td>
		</form>
	</tr>
</table>
<table border="1" align="center" width="80%" class="tabview">
	<th>No</th>
	<th>Nik</th>
	<th>Nama</th>
	<th>Jenis Kelamin</th>
	<th>Alamat</th>
	<th>No. Telepon</th>
	<th></th>

	<?php 
	include_once 'model.php';
	$eq = new yosuda;
	$show = $eq->show();
	$no = 1;

	if (isset($_POST['submit'])) {
		$show = $eq->searching($_POST['cari']);
	}
	
	if ($_SESSION['id']!=false) {
	
	while ($ambil=mysqli_fetch_array($show)) { ?>

		<tr>
			<td align="center"><?= $no++; ?></td>
			<td><?= $ambil['nik'];?></td>
			<td><?= $ambil['nama'];?></td>
			<td align="center"><?= $ambil['jk'];?></td>
			<td><?= $ambil['alamat'];?></td>
			<td><?= $ambil['no_hp'];?></td>
			<td align="center">
				<a href="index.php?page=form_karyawan&table=karyawan&ac=a&id=<?=$ambil['id'];?>">Edit</a> | 
				<a href="?ac=confirm&page=karyawan&id=<?=$ambil['id'];?>">Delete</a></td>
		</tr>
		
	<?php }

	}else{ 
		echo "<tr><td colspan='7' align='center'><h2>Anda Harus Login Terlebih Dahulu</h2></td></tr>";
	}

	 ?>
	
</table>

<?php 
if(isset($_GET['ac'])){?>
	<script>
		var cek = window.confirm("Hapus Data?");
		if(cek){
			alert("Data Dihapus");
			window.location.href = "control.php?aksi=delete&table=karyawan&id=<?=$_GET['id'];?>";
		}else{
				history.back();
		}
		</script><?php 
} ?>