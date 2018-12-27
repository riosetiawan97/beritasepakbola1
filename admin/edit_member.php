<?php
if(@$_SESSION['admin']){
	$datamember = mysqli_fetch_array(mysqli_query($koneksi, "select * from member where id_member = '$idmember'"));
	?>
<fieldset>
	<legend>Edit Member</legend>
	<form action="" method="post">
		<table>
			<tr>
				<td>Gambar</td>
				<td> : </td>
				<td><?php if($datamember['foto_profil']==''){?>
					<img src="foto_member/defaultfp.png" width="120px" />
					<?php }else{?>
					<img src="foto_member/<?php echo $datamember['foto_profil'];?>" width="120px" />
					<?php }?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td> : </td>
				<td><?php echo $datamember['email'];?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td> : </td>
				<td><?php echo $datamember['username'];?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><?php echo $datamember['nama_lengkap'];?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td> : </td>
				<td>
					<label><input type="radio" name="status" value="aktif" required <?php if($datamember['status']=='aktif'){echo "checked";}?> />aktif</label>
					<br>
					<label><input type="radio" name="status" value="nonaktif" required <?php if($datamember['status']=='nonaktif'){echo "checked";}?>/>nonaktif</label>
				</td>
			</tr> 
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Edit"/><input type="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>
	<?php
	$nama_lengkap = @$_POST['nama_lengkap'];
	$status = @$_POST['status'];
	$edit_member = @$_POST['edit'];
	if($edit_member){		
		mysqli_query($koneksi, "update member set status='$status' where id_member='$idmember'") or die (mysqli_error());
		?>
		<script type="text/javascript">
			alert("Edit member berhasil");
			history.go(-1);
		</script>
				<?php					
	}
	?>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>