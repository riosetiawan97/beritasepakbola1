<?php
@session_start();
if(@$_SESSION['admin']||@$_SESSION['member']){
?>
<fieldset>
	<legend>Buat Topik</legend>
	<form action="" method="post">
		<table>	
			<tr>
				<td>Judul Topik</td>
				<td> : </td>
				<td><input type="text" name="judul"/></td>
			</tr>
			<tr valign="top">
				<td>Isi Topik</td>
				<td> : </td>
				<td><textarea name="isi_topik" id="isi_topik"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="tambah" value="Tambah"/></td>
			</tr>
		</table>
		<script>                
                CKEDITOR.replace( 'isi_topik',
				{
				filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/gambar_forum/',
				height: '500', width:'680'
				} 
				);
        </script>
	</form>
	<?php	
	$idmember = $data_member['id_member'];
	$judultopik = @$_POST['judul'];
	$isitopik = @$_POST['isi_topik'];	
	$tambah_berita = @$_POST['tambah'];
	if($tambah_berita){
		if($judultopik==""||$isitopik==""){
	?>
			<script type="text/javascript">
			alert("Inputan Tidak Boleh Ada Yang Kosong");
			</script>
			<?php
		}else{
				mysqli_query($koneksi, "insert into forum values('',NULL,'$idmember','$judultopik','$isitopik','$hari_ini','$tgl_sekarang','$jam_komentar','','')") or die (mysqli_error());
				?>
				<script type="text/javascript">
				alert("Tambah Topik berhasil");
				window.location.href="?page=forum";
				</script>
				<?php
				
		}			
	}
	?>
</fieldset>
<?php
}else{
	?>
	<script type="text/javascript">
		alert("Silahkan Login untuk menambahkan topik");
		window.location.href="login.php";
	</script>
	<?php
}?>