<?php
@session_start();
include "config/koneksi.php";
if(@$_SESSION['member']){
	header("location: index.php");
}else if(@$_SESSION['admin']){
	header("location: indexadmin.php");
}else{
?>
<html>
<head>
<title>halaman Login - Berita Sepakbola</title>
<link rel="icon" href="icon/iconheader.png">
<link rel="stylesheet" href="css/login.css"/>
</head>
<body>
<div id="utama">
	<div id="Judul">
	Halaman Login
	</div>
	<div id="inputan">
	<form action="" method="post">
		Username :
		<input type="text" name="username" placeholder="Username" required class="lg"/>
		Password :
		<input type="Password" name="password" placeholder="Password" required class="lg"/>
		<div class="button">
			<input type="submit" name="login" value="login" class="btn"/>
				<a href="register.php"><button class="btn-right success">Register</button></a>
		</div>
		<a href="lupa_password.php">Lupa Password ?</a>
	</form>
	</div>	
</div>

	<?php
	$username = @$_POST['username'];
	$password = @$_POST['password'];
	$login = @$_POST['login'];
	
	if($login){
			$sql = mysqli_query($koneksi, "select * from member where username ='$username'and password=md5('$password')") or die (mysqli_error());
			$data = mysqli_fetch_array($sql);
			$cek = mysqli_num_rows($sql);
			if($cek>=1){
				if($data['status']=="aktif"){
					if($data['level'] == "admin"){
						@$_SESSION['admin'] = $data['id_member'];
						?>
						<script type="text/javascript">
						window.location.href="indexadmin.php";
						</script>
						<?php
					}else if($data['level'] == "member"){
						@$_SESSION['member'] = $data['id_member'];
						?>
						<script type="text/javascript">
						window.location.href="index.php";
						</script>
						<?php
					}
				}else{
					echo "<div class='warning'>Akun Anda telah di Non Aktifkan</div>";
				}
			}else{
				echo "<div class='warning'>Login Gagal</div>";
			}
	}
	?>
</body>
</html>
<?php
}
?>