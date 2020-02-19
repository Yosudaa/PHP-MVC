<table align="center" class="tabinput">
<tr align="center">
	<td>

<?php 
include_once 'model.php';
error_reporting(0);
$eq = new yosuda;
$edit = $eq->read($_GET['kd_brg']);
$ambil = mysqli_fetch_array($edit);
	
		if($_GET['ac']=="add"){ ?>
			<h1>Tambah Barang</h1>
			<form method="post" action="control.php?aksi=add&table=barang">
			<input type="text" class="fominput" name="kd_brg" placeholder="Kode barang"><br>
<?php 	}else{ ?>
			<h1>Edit Barang</h1>
			<form method="post" action="control.php?aksi=edit&table=barang&kd_brg=<?=$ambil['kd_brg'];?>">
<?php	}

 ?>
			<input type="text" class="fominput" name="nm_brg" placeholder="Nama barang" value="<?= $ambil['nm_brg']; ?>"><br>
			<input type="text" class="fominput" name="stok" placeholder="Stok Barang" value="<?= $ambil['stok']; ?>"><br>
			<input type="text" class="fominput" name="harga" placeholder="Harga Barang" value="<?= $ambil['harga']; ?>"><br><br>
			<input type="submit" class="btnok" name="submit" value="Submit">
		</form>
	</td>
</tr>
	
</table>