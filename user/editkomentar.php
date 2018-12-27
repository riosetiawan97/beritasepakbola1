<?php
@session_start();
	$id_komentar = @$_GET['id_komentar'];
	$querykomentar = mysqli_query($koneksi, "select * from berita,komentar 
									where berita.id_berita=komentar.id_berita and komentar.id_komentar = '$id_komentar'") or die (mysqli_error());
	$datakomentar = mysqli_fetch_array($querykomentar);
if($data_member['id_member'] == $datakomentar['id_member']){
?>	
<fieldset>
	<legend>Edit Komentar</legend>
	
	<form action="" method="post">
		<table>	
			<tr valign="top">
				<td>Komentar</td>
				<td> : </td>
				<td><textarea name="komentar" style="width: 500px; height: 350px;"><?php echo $datakomentar['komentar'];?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Edit"/><input type="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>
	<?php	
	$komentar = @$_POST['komentar'];	
	$edit = @$_POST['edit'];
	if($edit){
		if($komentar==""){
	?>
			<script type="text/javascript">
			alert("Inputan Tidak Boleh Ada Yang Kosong");
			</script>
			<?php
		}else{
			mysqli_query($koneksi, "update komentar set komentar='$komentar' where id_komentar='$id_komentar'") or die (mysqli_error());
			?>
			<script type="text/javascript">
			alert("edit komentar berhasil");
			window.location.href="?page=berita&id_kategori_berita=<?php echo $datakomentar['id_kategori_berita'];?>&id_berita=<?php echo $datakomentar['id_berita'];?>";
			</script>
			<?php			
		}		
	}
	?>
</fieldset>
<?php
}else{
	header("location: ?page=berita&id_kategori_berita=$datakomentar[id_kategori_berita]&id_berita=$datakomentar[id_berita]");
}?>