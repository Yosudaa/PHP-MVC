<table align="center" class="tabinput">
<tr align="center">
	<td>

<?php 
include_once 'model.php';
error_reporting(0);
$eq = new yosuda;
$edit = $eq->read($_GET['id']);
$ambil = mysqli_fetch_array($edit);

		if ($_GET['ac']=="add") { ?>
  			<h1>Tambah Karyawan</h1>
			<form method="post" action="control.php?aksi=add&table=karyawan">
<?php 	}else{ ?>
			<h1>Edit Karyawan</h1>
			<form method="post" action="control.php?aksi=edit&table=karyawan&id=<?= $ambil['id']; ?>">
<?php	}

?>
			<input type="text" class="fominput" name="nik" placeholder="NIK" value="<?= $ambil['nik']; ?>"><br>
			<input type="text" class="fominput" name="nama" placeholder="Nama Karyawan" value="<?= $ambil['nama']; ?>"><br>
			<input type="text" class="fominput" name="jk" placeholder="Jenis Kelamin" value="<?= $ambil['jk']; ?>"><br>
			<input type="text" class="fominput" name="alamat" placeholder="Alamat" value="<?= $ambil['alamat']; ?>"><br>
			<input type="text" class="fominput" name="no_hp" placeholder="Nomor HP" value="<?= $ambil['no_hp']; ?>"><br><br>
			<input type="submit" class="btnok" name="submit" value="Submit">
		</form>
	</td>
</tr>
	
</table>