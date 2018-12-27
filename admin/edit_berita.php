<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Edit Data Berita</legend>
	<?php
	$data_berita = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita where id_berita = '$kdberita'"));
	$query_kategori_berita = mysqli_query($koneksi, "select * from kategori_berita");
	?>	
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id berita</td>
				<td> : </td>
				<td><input type="text" name="id_berita" value="<?php echo $data_berita['id_berita']; ?>" disabled="disabled"/></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td> : </td>
				<td>
					<select name="kategori_berita">
						<?php
						while ($kategoriberita = mysqli_fetch_array($query_kategori_berita)) {
						?>
						<option value="<?php echo $kategoriberita["id_kategori_berita"] ?>" <?php if ($data_berita["id_kategori_berita"]==$kategoriberita["id_kategori_berita"]) echo "selected";?>>
							<?php echo $kategoriberita["nama_kategori_berita"] ?>
						</option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td> : </td>
				<td><input type="text" name="penulis" value="<?php echo $data_berita['penulis'];?>"/></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td> : </td>
				<td><input type="text" name="judul" value="<?php echo $data_berita['judul'];?>"/></td>
			</tr>
			<tr>
				<td>Isi Berita</td>
				<td> : </td>
				<td><textarea name='isi_berita' id="isi_berita" style='width: 500px; height: 350px;'><?php echo $data_berita['isi_berita'];?></textarea></td>
			</tr>
			<tr>
				<td>Sumber</td>
				<td> : </td>
				<td><input type="text" name="sumber" value="<?php echo $data_berita['sumber'];?>"/></td>
			</tr>
			<tr>
				<td>URL</td>
				<td> : </td>
				<td><input type="text" name="url" value="<?php echo $data_berita['url'];?>"/></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td> : </td>
				<td><img src="foto_berita/<?php echo $data_berita['gambar'];?>" width="120px" /></td>
			</tr>
			<tr>
				<td>Ganti Gambar</td>
				<td> : </td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="edit" value="Edit"/><input type="reset" value="Reset"/></td>
			</tr>
		</table>
		<script>                
                 CKEDITOR.replace( 'isi_berita',
				{filebrowserBrowseUrl: 'ckeditor/ckfinder/ckfinder.html',
				filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				height: '500', width:'800'
				} 
				);
            </script>
	</form>
	<?php
	$kategori_berita = @$_POST['kategori_berita'];
	$penulis = @$_POST['penulis'];
	$judul = @$_POST['judul'];
	$isiberita = @$_POST['isi_berita'];
	$sumberberita = @$_POST['sumber'];
	$url = @$_POST['url'];
	$sumber = @$_FILES['gambar']['tmp_name'];	
	$target = 'foto_berita/';
	$nama_gambar = @$_FILES['gambar']['name'];
	$edit_berita = @$_POST['edit'];
	if($edit_berita){
		if($kategori_berita==""||$judul==""||$isiberita==""){
	?>
			<script type="text/javascript">
			alert("Inputan Tidak Boleh Ada Yang Kosong");
			</script>
			<?php
		}else{
			if($nama_gambar == ""){
				mysqli_query($koneksi, "update berita set id_kategori_berita='$kategori_berita', penulis='$penulis', judul='$judul', isi_berita='$isiberita', sumber='$sumberberita',url='$url' where id_berita='$kdberita'") or die (mysqli_error());
			?>
					<script type="text/javascript">
					alert("Update Data berita berhasil");
					window.location.href="?page=berita&action=view";
					</script>
					<?php
			}else{
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if($pindah){
					mysqli_query($koneksi, "update berita set id_kategori_berita='$kategori_berita', penulis='$penulis', judul='$judul', isi_berita='$isiberita', sumber='$sumberberita',url='$url', gambar='$nama_gambar' where id_berita='$kdberita'") or die (mysqli_error());
					?>
					<script type="text/javascript">
					alert("Update Data berita berhasil");
					window.location.href="?page=berita&action=view";
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
	}
	?>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>