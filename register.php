<html>
<head>
<title>halaman Register</title>
<link rel="stylesheet" href="css/login.css"/>
<link rel="icon" href="icon/iconheader.png">
</head>
<body>
<div id="utama" style="margin-top:8%;">
	<div id="Judul">
		Halaman Register
	</div>
	<div id="inputan">
		<form action="" method="post">
				Email :
				<input type="email" name="email" placeholder="Enter Email" required class="lg"/>
				Username :
				<input type="text" name="username" placeholder="Username" required class="lg"/>
				Password :
				<input type="Password" name="password" placeholder="Password" required class="lg"/>
				Nama Lengkap :
				<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required class="lg"/>
			    <div class="button">
					<input type="submit" name="register" value="Register" class="btn"/>
					<a href="login.php"><button class="btn-right success">Login</button></a>
				</div>
			</div>
		</form>
	</div>	
	<?php
	include "config/koneksi.php";
	if(@$_POST['register']){
		$email = @$_POST['email'];
		$username = @$_POST['username'];
		$pass = @$_POST['password'];
		$nama_lengkap = @$_POST['nama_lengkap'];	
	$data_email = mysqli_num_rows(mysqli_query($koneksi, "select * from member where email ='$email'"));	
	$data_username = mysqli_num_rows(mysqli_query($koneksi, "select * from member where username ='$username'"));	
		if($data_email>=1){
			?><script type="text/javascript">alert('Email yang anda masukkan sudah digunakan');</script><?php
		}else if($data_username>=1){
			?><script type="text/javascript">alert('Username yang anda masukkan sudah digunakan');</script><?php
		}else{
				$sql_insert = mysqli_query($koneksi, "insert into member values('','','$email','$username',md5('$pass'),'$nama_lengkap','member','aktif')") or die (mysqli_error());
				?><script type="text/javascript">alert("Pendaftaran Berhasil, silakan login");window.location.href="login.php";</script><?php
		}
	}
	?>
</div>
</body>
</html>