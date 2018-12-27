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
<title>Reset Password - Berita Sepakbola</title>
<link rel="stylesheet" href="css/login.css"/>
<link rel="icon" href="icon/iconheader.png">
</head>

<body>
<div id="utama">
	<div id="Judul">
	Lupa Password
	</div>
	<div id="inputan">
		<form action="" method="post">
			<label>Masukkan Email anda untuk melakukan reset password</label><br><br>
			<input name="email" type="email" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Masukkan Email Dengan benar')" class="lg"/>
			<div class="button">
				<input class="btn" name="act_resset" type="submit" value="Submit"/>
				<a href="login.php"><button class="btn-right success">Login</button></a>
			</div>
		</form>
	</div>	
</div>

<div style="width:600px; margin:auto">

<?php
@session_start();
include "config/koneksi.php";
if (isset($_POST['act_resset']))  {
$password="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($password);
$start=$len-$panjang; $xx=rand('0',$start);
$yy=str_shuffle($password);
$passwordbaru=substr($yy, $xx, $panjang);
$email = @$_POST['email'];
$password = MD5($passwordbaru);

// mencari alamat email si user
$hasil= mysqli_query($koneksi, "SELECT * FROM member WHERE email ='$email'");
$data  = mysqli_fetch_array($hasil);
$cek = mysqli_num_rows($hasil);
$UserId = $data['id_member'];
$email = $data['email'];
$nama = $data['nama_lengkap'];
$username = $data['username'];
if ($cek == 1) {

	// title atau subject email
	$title  = "Permintaan Password Baru";

	// isi pesan email disertai password
	$pesan  = "Kami telah reset ulang password ".$nama." Dan anda dapat login kembali ke member area kami \n\n
	DETAIL AKUN ANDA :
	\nUsername : ".$username."
	\nNew Password: ".$passwordbaru."
	\n\n PESAN NO-REPLY";

	// header email berisi alamat pengirim
	$header = "From: Berita Sepakbola - <mail@beritasepakbola.com>";

	// mengirim email
	$kirimEmail = mail($email, $title, $pesan, $header);

	// cek status pengiriman email
	if ($kirimEmail) {
		// update password baru ke database (jika pengiriman email sukses)
		$hasil = mysqli_query($koneksi, "UPDATE member SET password='$password' WHERE id_member = '$UserId'");

		if ($hasil)
		echo'
		<div class="warning">Password baru berhasil direset dan dikirim ke email "'.$email.'" Silahkan cek di kotak inbox atau kotak SPAM email</div></br><hr>';
	}
	else {
		echo'<div class="warning">Pengiriman Password baru ke email gagal</div>';
	}
}
else {
echo'<div class="warning">Alamat Email tidak ditemukan</div>';
}}
?>

</div>
</body>
</html>

<?php
}
?>