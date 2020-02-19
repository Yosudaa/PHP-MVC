<?php 
$db = mysqli_connect("localhost","root","","yosuda");
$y = $_GET['kd_brg'];
$hasil = mysqli_query($db, "DELETE FROM barang WHERE kd_brg=$y");
header("location:index.php?page=barang");
 ?>