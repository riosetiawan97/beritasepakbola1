<fieldset>
	<legend>Lapor Post</legend>
	<a>Mengapa Anda Melaporkan Post ini ?</a>
	<br>
	<br>
	<form action="" method="post">
		<table>	
			<tr valign="top">
				<td>Laporan</td>
				<td> : </td>
				<td>
				<label><input type="radio" name="laporan" value="Post ini tidak baik" required />Post ini tidak baik</label>
				<br>
				<label><input type="radio" name="laporan" value="Post ini tidak berkaitan dengan sepakbola" required />Post ini tidak berkaitan dengan sepakbola</label>
				<br>
				<label><input type="radio" name="laporan" value="Post ini adalah spam" required />Post ini adalah spam</label>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="Submit" name="lapor" value="Kirim Laporan"/></td>
			</tr>
		</table>
	</form>
	<?php
$laporan = @$_POST['laporan'];	
$lapor = @$_POST['lapor'];
$id_forum= @$_GET['id_forum'];
$id_komentar= @$_GET['id_komentar'];
if($id_forum!=""){
	$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "select * from member,forum 
									where member.id_member=forum.id_member 
									and forum.id_forum = '$id_forum'"));
	if($lapor){
		if(@$_SESSION['admin']||@$_SESSION['member']){
			$id_member = $data_member['id_member'];
			mysqli_query($koneksi, "insert into laporan values('',NULL,'$id_forum','$id_member','$dataforum[id_member]','$laporan','$hari_ini','$tgl_sekarang','$jam_komentar')") or die (mysqli_error());
		}else{
			mysqli_query($koneksi, "insert into laporan values('',NULL,'$id_forum',NULL,'$dataforum[id_member]','$laporan','$hari_ini','$tgl_sekarang','$jam_komentar')") or die (mysqli_error());
		}
		if($dataforum['id_balasan']==NULL){
		?>
			<script type="text/javascript">
			alert("Laporan berhasil dikirimkan");
			window.location.href="?page=forum&id_forum=<?php echo $dataforum['id_forum'];?>";
			</script>
			<?php
		}else{
			$datatopik= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$dataforum[id_balasan]"));
			if($datatopik['id_balasan']==NULL){
				?>
				<script type="text/javascript">
				alert("Laporan berhasil dikirimkan");
				window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_forum'];?>";
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
				alert("Laporan berhasil dikirimkan");
				window.location.href="?page=forum&id_forum=<?php echo $datatopik['id_balasan'];?>";
				</script>
				<?php
			}
		}
	}
}elseif($id_komentar!=""){
	$datakomentar = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita,komentar,member
									where berita.id_berita = komentar.id_berita 
									and komentar.id_member = member.id_member
									and komentar.id_komentar = '$id_komentar'"));
	if($lapor){
		if(@$_SESSION['admin']||@$_SESSION['member']){
			$id_member = $data_member['id_member'];
			mysqli_query($koneksi, "insert into laporan values('','$id_komentar',NULL,'$id_member','$datakomentar[id_member]','$laporan','$hari_ini','$tgl_sekarang','$jam_komentar')") or die (mysqli_error());
		}else{
			mysqli_query($koneksi, "insert into laporan values('','$id_komentar',NULL,NULL,'$datakomentar[id_member]','$laporan','$hari_ini','$tgl_sekarang','$jam_komentar')") or die (mysqli_error());
		}
		?>
			<script type="text/javascript">
			alert("Laporan berhasil dikirimkan");
			window.location.href="?page=berita&id_kategori_berita=<?php echo $datakomentar['id_kategori_berita'];?>&id_berita=<?php echo $datakomentar['id_berita'];?>";
			</script>
			<?php
	}
}
	?>
</fieldset>