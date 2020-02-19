<table class="tabinput" align="center">
<tr align="center">
	<td>

<?php
//Jika ingin mendaftar tekan tombol i
if($_GET['ac']=="login") { ?>
		<h1>Log<a href="index.php?page=login&ac=regis">I</a>n</h1>
		<form method="post" action="control.php?aksi=log&ac=login">
<?php 	
}else{ ?>
			<h1>Register</h1>
		<form method="post" action="control.php?aksi=log&ac=reg">
			<input type="nama" class="fominput" name="nama" placeholder="Nama Lengkap"><br>
<?php } ?>
<!------------------------------------------------------------------------------------------->
			<input type="text" class="fominput" name="user" placeholder="Username"><br>
			<input type="password" class="fominput" name="pass" placeholder="Password"><br><br>
<!------------------------------------------------------------------------------------------->
<?php
if($_GET['ac']=="login") { ?>
			<input type="submit" name="log" class="btnok" value="Login">
<?php 	
}else{ ?>
			<input type="submit" name="log" class="btnok" value="Daftar">
		
<?php } ?>			
		</form>
	</td>
</tr>
	
</table>