<?php
if(@$_SESSION['admin']||@$_SESSION['member']){?>
<fieldset>
	<legend>Edit Profil</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Gambar</td>
				<td> : </td>
				<td><?php if($data_member['foto_profil']==''){?>
					<img src="foto_member/defaultfp.png" width="120px" />
					<?php }else{?>
					<img src="foto_member/<?php echo $data_member['foto_profil'];?>" width="120px" />
					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Ganti Gambar</td>
				<td> : </td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td> : </td>
				<td><?php echo $data_member['username'];?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><input type="text" name="nama_lengkap" value="<?php echo $data_member['nama_lengkap'];?>" required /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td> : </td>
				<td><a href="?page=gantipassword">Ganti Password</a></td>
			</tr> 
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Edit"/><input type="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>
	<?php
	$sumber = @$_FILES['gambar']['tmp_name'];	
	$target = 'foto_member/';
	$nama_gambar = @$_FILES['gambar']['name'];
	$nama_lengkap = @$_POST['nama_lengkap'];
	$edit_profil = @$_POST['edit'];
	if($edit_profil){		
		if($nama_gambar == ""){
			mysqli_query($koneksi, "update member set nama_lengkap='$nama_lengkap' where id_member='$member_terlogin'") or die (mysqli_error());
		?>
				<script type="text/javascript">
				alert("Edit Profil berhasil");
				history.go(-1);
				</script>
				<?php
		}else{
			$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
			if($pindah){
				mysqli_query($koneksi, "update member set foto_profil='$nama_gambar', nama_lengkap='$nama_lengkap' where id_member='$member_terlogin'") or die (mysqli_error());
				?>
				<script type="text/javascript">
				alert("Edit Profil berhasil");
				history.go(-1);
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
				alert("Gambar gagal diupload");
				</script>
				<?php
			}	
		}					
	}
	?>
</fieldset>
<?php
}else{
	echo "404! Halaman tidak Ditemukan";
}?>
