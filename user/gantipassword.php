<?php
if(@$_SESSION['admin']||@$_SESSION['member']){?>
<fieldset>
	<legend>Ganti Password</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Password Lama</td>
				<td> : </td>
				<td><input type="password" name="passwordlama" required /></td>
			</tr> 
			<tr>
				<td>Password Baru</td>
				<td> : </td>
				<td><input type="password" name="passwordbaru" required /></td>
			</tr> 
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Simpan"/></td>
			</tr>
		</table>
	</form>
	<?php
	$passwordlama = @$_POST['passwordlama'];
	$passwordbaru = @$_POST['passwordbaru'];
	$edit_password = @$_POST['edit'];
	if($edit_password){	
	$passwordlama1 = md5($passwordlama);
	$passwordbaru1 = md5($passwordbaru);
	if($data_member['password']!=$passwordlama1){
		?>
		<script type="text/javascript">
		alert("Password Lama tidak sesuai");
		</script>
		<?php
	}else{
		mysqli_query($koneksi, "update member set password='$passwordbaru1' where id_member='$member_terlogin'") or die (mysqli_error());
		?>
		<script type="text/javascript">
		alert("Edit Password berhasil");
		history.go(-2);
		</script>
		<?php
	}
	}
	?>
</fieldset>
<?php
}else{
	echo "404! Halaman tidak Ditemukan";
}?>
