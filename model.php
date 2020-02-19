<?php 

class yosuda{

	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db   = "yosuda";

	public function __construct()
	{
		$this->db = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
	}
	// Model sudah terinclude dalam file yang terpanggil dengan GET, jadi tinggal disamakan
	public function show()
	{	
		if($_GET['page'] == "barang") {
			$show = $this->db->query("SELECT * FROM barang");
		}else{
			$show = $this->db->query("SELECT * FROM karyawan");	
		}
		
		return $show;
	}

	public function add($y,$o,$g,$i,$sp)
	{
		if($_GET['table'] == "barang"){
			$add = $this->db->query("INSERT INTO barang VALUES ('$y', '$o', '$g', '$i')");	
		}else{
			$add = $this->db->query("INSERT INTO karyawan VALUES (NULL, '$y', '$o', '$g', '$i', '$sp')");
		}

		return $add;
	}

	public function read($y)
	{
		if($_GET['table'] == "barang"){
			$read = $this->db->query("SELECT * FROM barang WHERE kd_brg=$y");
		}else{
			$read = $this->db->query("SELECT * FROM karyawan WHERE id=$y");	
		}
		
		return $read;
	}

	public function edit($y,$o,$s,$u,$d,$a)
	{
		if($_GET['table'] == "barang"){
			$this->db->query("UPDATE `barang` SET `nm_brg` = '$o', `stok` = '$s', `harga` = '$u' WHERE `barang`.`kd_brg` = $y;");	
		}else{
			$this->db->query("UPDATE `karyawan` SET `nik` = '$o', `nama` = '$s', `jk` = '$u', `alamat` = '$d', `no_hp` = '$a' WHERE `karyawan`.`id` = $y;");
		}
	}

	public function delete($y)
	{
		if($_GET['table'] == "barang"){
			$this->db->query("DELETE FROM barang WHERE kd_brg=$y");
		}else{
			$this->db->query("DELETE FROM karyawan WHERE id=$y");
		}
	}

	public function searching($y)
	{
		if ($_GET['page']=="barang") {
			$search = $this->db->query("SELECT * FROM barang WHERE nm_brg LIKE '%$y%'");
		}else{
			$search = $this->db->query("SELECT * FROM karyawan WHERE nama LIKE '%$y%'");
		}

		return $search;
	}

	public function rating($y,$s,$p)
	{
		$this->db->query("INSERT INTO rating VALUES (NULL, '$y', '$s', '$p');");
	}

	public function rated($yo,$gi)
	{
		$rate = $this->db->query("SELECT * FROM rating WHERE id_user='$yo' AND kd_brg='$gi'");
		$cek = mysqli_num_rows($rate);

		if($cek){
			return $rate;
		}else{
			return false;
		}

	}

	public function avgrate($y)
	{
		$sum = $this->db->query("SELECT * FROM rating WHERE kd_brg='$y'");
		return $sum;
	}

	public function log($y,$s,$p)
	{
		if ($_GET['ac']=="login") {
			$log = $this->db->query("SELECT * FROM user WHERE username='$y' AND password='$s'");
			$cek = mysqli_num_rows($log);

			if($cek>0){
				$this->sesi($log);
			}
			// return data hasil data log
			return $cek;

		}else{
			$this->db->query("INSERT INTO user VALUES (NULL,'$y','$s','$p');");
		}
	}

	public function sesi($log)
	{
		session_start();
		$sesi = mysqli_fetch_assoc($log);
		$_SESSION['id']=$sesi['id'];
		$_SESSION['nama']=$sesi['nama'];
		$_SESSION['username']=$sesi['username'];
	}

	public function logout()
	{
		session_start();
		session_destroy();
	}

	public function rp($no){
		$rp = "Rp. ".number_format($no,2,',','.');
		return $rp;
	}

}
?>