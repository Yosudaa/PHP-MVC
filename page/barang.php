<h1 align="center">Data Barang</h1>
<table width="80%" align="center">
	<tr>
		<td width="20%"><a href="index.php?page=form_barang&ac=add"><button>Tambah Data</button></a></td>
	<form action="" method="post">
		<td align="right"><input type="text" name="cari" placeholder="Cari Nama Barang"></td>
		<td width="5%"><input type="submit" name="search" value="Cari"></td>
	</form>
	</tr>
</table>
<table border="1" width="80%" align="center" class="tabview">
	<th>No</th>
	<th>Kode</th>
	<th>Nama</th>
	<th>Stok</th>
	<th>Harga</th>
	<th></th>

	<?php 
	include_once 'model.php';
	$eq = new yosuda;
	$show = $eq->show();
	$no = 1;

	if (isset($_POST['search'])) {
		$show = $eq->searching($_POST['cari']);
	}

	if ($_SESSION['id']!=false) {

		while ($ambil=mysqli_fetch_array($show)) { ?>

			<tr>
				<td align="center"><?= $no++; ?>.</td>
				<td align="center"><?= $ambil['kd_brg'];?></td>
				<td>
					<a href="index.php?page=ulasan&table=barang&kd_brg=<?=$ambil['kd_brg']; ?>"><?= $ambil['nm_brg'];?></a>
				</td>
				<td align="center"><?= $ambil['stok'];?></td>
				<td><?= $eq->rp($ambil['harga']); ?></td>
				<td align="center" width="15%">
				 <a href="index.php?page=form_barang&table=barang&ac=a&kd_brg=<?=$ambil['kd_brg']; ?>">Edit</a> | 
				 <a href="?ac=confirm&page=barang&kd_brg=<?=$ambil['kd_brg'];?>">Delete</a>
				</td>
			</tr>
<?php	}
	
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
			window.location.href = "control.php?aksi=delete&table=barang&kd_brg=<?=$_GET['kd_brg'];?>";
		}else{
				history.back();
		}
		</script><?php 
} ?>

