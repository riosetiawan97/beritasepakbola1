<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Tambah Member</legend>
	<form action="" method="post">
		<table>
			<tr>
				<td>Email</td>
				<td> : </td>
				<td><input type="email" name="email" required /></td>
			</tr>
			<tr>
				<td>Username</td>
				<td> : </td>
				<td><input type="text" name="username" required /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td> : </td>
				<td><input type="text" name="password" required /></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><input type="text" name="nama_lengkap" required /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="tambah" value="Tambah"/></td>
			</tr>
		</table>
	</form>
	<?php
	$email = @$_POST['email'];
	$username = @$_POST['username'];
	$pass = @$_POST['password'];
	$nama_lengkap = @$_POST['nama_lengkap'];
	$tambah_member = @$_POST['tambah'];
	$data_email = mysqli_num_rows(mysqli_query($koneksi, "select * from member where email ='$email'"));	
	$data_username = mysqli_num_rows(mysqli_query($koneksi, "select * from member where username ='$username'"));	
	if($tambah_member){
		if($data_email>=1){
			?><script type="text/javascript">alert('Email yang anda masukkan sudah digunakan');</script><?php
		}else if($data_username>=1){
			?><script type="text/javascript">alert('Username yang anda masukkan sudah digunakan');</script><?php
		}else{
			mysqli_query($koneksi, "insert into member values('','','$email','$username',md5('$pass'),'$nama_lengkap','member','aktif')") or die(mysqli_error($koneksi));
			echo '<script type="text/javascript">
				alert("Tambah Data member baru berhasil");
				window.location.href="?page=member&action=view";
				</script>';
		}
	}
	?>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>