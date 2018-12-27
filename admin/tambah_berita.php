<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Tambah Data Berita</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Kategori</td>
				<td> : </td>
				<td>
					<select name="kategori_berita" required>
						<?php
						$query_kategori_berita = mysqli_query($koneksi, "select * from kategori_berita");
						while ($kategoriberita = mysqli_fetch_array($query_kategori_berita)) {
						?>
						<option value="<?php echo $kategoriberita["id_kategori_berita"] ?>"><?php echo $kategoriberita["nama_kategori_berita"] ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td> : </td>
				<td><input type="text" name="penulis" required /></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td> : </td>
				<td><input type="text" name="judul" required /></td>
			</tr>
			<tr valign="top">
				<td>Isi Berita</td>
				<td> : </td>
				<td><textarea name="isi_berita" id="isi_berita" style="width: 500px; height: 350px;" required ></textarea></td>
			</tr>
			<tr>
				<td>Sumber</td>
				<td> : </td>
				<td><input type="text" name="sumber" required /></td>
			</tr>
			<tr>
				<td>Url</td>
				<td> : </td>
				<td><textarea type="text" name="url" style="width: 600px;" required ></textarea></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td> : </td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="tambah" value="Tambah"/></td>
			</tr>
		</table>
		<script>                
                CKEDITOR.replace( 'isi_berita',
				{filebrowserBrowseUrl: 'ckeditor/ckfinder/ckfinder.html',
				filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				height: '500'
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
	$tambah_berita = @$_POST['tambah'];
	if($tambah_berita){
		$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
		if($pindah){
			mysqli_query($koneksi, "insert into berita values('','$kategori_berita','$penulis','$judul','$isiberita','$hari_ini','$tgl_sekarang','$jam_sekarang','$sumberberita','$url','$nama_gambar','')") or die (mysqli_error());
			?>
			<script type="text/javascript">
			alert("Tambah Data Berita berhasil");
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
	?>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>