<?php
@session_start();
	$id_forum = @$_GET['id_forum'];
	$queryforum = mysqli_query($koneksi, "select * from forum 
									where id_forum = '$id_forum'") or die (mysqli_error());
	$dataforum = mysqli_fetch_array($queryforum);
if($data_member['id_member'] == $dataforum['id_member']){
?>
<fieldset>
	<legend>Edit Post</legend>
	<form action="" method="post">
		<table>	
			<?php
			if($dataforum['judulforum'] != ""){
			?>
			<tr>
				<td>Judul Topik</td>
				<td> : </td>
				<td><input type="text" name="judul" value="<?php echo $dataforum['judulforum'];?>" required></td>
			</tr>
			<?php
			}
			?>
			<tr valign="top">
				<td>Isi Topik</td>
				<td> : </td>
				<td><textarea name="isi_topik" id="isi_topik" style="width: 500px; height: 350px;" required><?php echo $dataforum['isi_forum'];?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Edit"/><input type="reset" value="Reset"/></td>
			</tr>
		</table>
		<script>                
                CKEDITOR.replace( 'isi_topik',
				{
				filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/gambar_forum/',
				height: '500', width:'700'
				} 
				);
        </script>
	</form>
	<?php	
	$judultopik = @$_POST['judul'];
	$isitopik = @$_POST['isi_topik'];	
	$edit_forum = @$_POST['edit'];
	if($edit_forum){
		if($dataforum['id_balasan']==NULL){
		mysqli_query($koneksi, "update forum set judulforum='$judultopik', isi_forum='$isitopik ' where id_forum='$id_forum'") or die (mysqli_error());
				?>
				<script type="text/javascript">
				alert("edit Topik berhasil");
				window.location.href="?page=forum&id_forum=<?php echo $dataforum['id_forum'];?>";
				</script>
				<?php
		}else{
			mysqli_query($koneksi, "update forum set isi_forum='$isitopik ' where id_forum='$id_forum'") or die (mysqli_error());
			$datatopik= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$dataforum[id_balasan]"));
			if($datatopik['id_balasan']==NULL){
			?>
			<script type="text/javascript">
			alert("edit Post berhasil");
			window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_forum'];?>";
			</script>
			<?php
			}else{
			?>
			<script type="text/javascript">
			alert("edit Post berhasil");
			window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_balasan'];?>";
			</script>
			<?php
			}
		}			
	}
	?>
</fieldset>
<?php
}else{
	?>
	<script type="text/javascript">
	window.location.href="?page=forum";
	</script>
	<?php
}?>