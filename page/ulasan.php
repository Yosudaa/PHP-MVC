<?php 
include_once 'model.php';
$eq = new yosuda;
$read = $eq->read($_GET['kd_brg']);
$edit = mysqli_fetch_assoc($read);

$rated = $eq->rated($_SESSION['id'],$_GET['kd_brg']);
$value = mysqli_fetch_array($rated);

$avgrate = $eq->avgrate($_GET['kd_brg']);
$rater = mysqli_num_rows($avgrate);

$rate = 0;
while ($total = mysqli_fetch_array($avgrate)) {
	$rate += $total['rating'];
	$hasil = $rate / $rater;
	$ratarate = number_format($hasil,1);
}

 ?>

 <h1><?= $edit['nm_brg']; ?></h1>
 <h3>Harga  : <?= $eq->rp($edit['harga']);?></h3>
 <h3>Stok   : <?= $edit['stok'];?></h3>
 <h3>Rating : <?= $ratarate; ?></h3>


<?php 
if ($rated) {
	?><h3>Rating Anda :<?php
	if ($value['rating']==5) {
		?>  <span class="star">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <?php
	}elseif ($value['rating']==4) {
		?>  <span class="star">&#9733;&#9733;&#9733;&#9733;&#10025;</span> <?php
	}elseif ($value['rating']==3) {
		?>  <span class="star">&#9733;&#9733;&#9733;&#10025;&#10025;</span> <?php
	}elseif ($value['rating']==2) {
		?>  <span class="star">&#9733;&#9733;&#10025;&#10025;&#10025;</span> <?php
	}elseif ($value['rating']==1) {
		?>  <span class="star">&#9733;&#10025;&#10025;&#10025;&#10025;</span> <?php
	}
}
else{ ?></h3>

<span class="bintang">
 	Beri Rating : 
 	<a href="control.php?value=1&aksi=rate&kd_brg=<?=$_GET['kd_brg'];?>" onmouseover="satu()" onmouseleave="keluar()" class="star">&#10025;</a>
 	<a href="control.php?value=2&aksi=rate&kd_brg=<?=$_GET['kd_brg'];?>" onmouseover="dua()" onmouseleave="keluar()" class="star">&#10025;</a>
 	<a href="control.php?value=3&aksi=rate&kd_brg=<?=$_GET['kd_brg'];?>" onmouseover="tiga()" onmouseleave="keluar()" class="star">&#10025;</a>
 	<a href="control.php?value=4&aksi=rate&kd_brg=<?=$_GET['kd_brg'];?>" onmouseover="empat()" onmouseleave="keluar()" class="star">&#10025;</a>
	<a href="control.php?value=5&aksi=rate&kd_brg=<?=$_GET['kd_brg'];?>" onmouseover="lima()" onmouseleave="keluar()" class="star">&#10025;</a>
</span>

<?php } ?>

<?php include_once 'script.php'; ?>
