<?php
if(@$_SESSION['admin']){
	$data_laporan = mysqli_fetch_array(mysqli_query($koneksi, "select * from laporan,member
									where member.id_member = laporan.id_member_dilaporkan and laporan.id_laporan = '$idlaporan'"));
	$tgl = tgl_indo($data_laporan['tanggal']);
	if($data_laporan['id_forum'] !=NULL){
		$data_post = mysqli_fetch_array(mysqli_query($koneksi, "select * from member,forum where member.id_member=forum.id_member and forum.id_forum = $data_laporan[id_forum]"));
		$isi_post = $data_post['isi_forum'];
	}elseif($data_laporan['id_komentar']!=NULL){
		$data_post = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita,member,komentar 
									where berita.id_berita=komentar.id_berita and 
									member.id_member=komentar.id_member and 
									komentar.id_komentar = $data_laporan[id_komentar]"));
		$isi_post = $data_post['komentar'];
	}
	if($data_laporan['id_member_pelapor']!=NULL){
		$data_user_pelapor = mysqli_fetch_array(mysqli_query($koneksi, "select * from member,laporan where member.id_member=$data_laporan[id_member_pelapor]"));
		$pelapor = $data_user_pelapor['username'];
	}else{
		$pelapor = 'unknown';
	}
?>
<fieldset>
	<legend>Lapor Post</legend>
	
	<form action="" method="post">
		<table>	
			<tr valign="top">
				<td>Waktu Lapor</td>
				<td> : </td>
				<td><?php echo $data_laporan['hari'].", ".$tgl." - ".$data_laporan['jam']." WIB";?></td>
			</tr>
			<tr valign="top">
				<td>Pelapor</td>
				<td> : </td>
				<td><?php echo $pelapor;?></td>
			</tr>
			<tr valign="top">
				<td>Username yang dilaporkan</td>
				<td> : </td>
				<td><?php echo $data_laporan['username'];?></td>
			</tr>
			<tr valign="top">
				<td>Laporan</td>
				<td> : </td>
				<td><?php echo $data_laporan['isi_laporan'];?></td>
			</tr>
			<tr valign="top">
				<td>Post yang dilaporkan</td>
				<td> : </td>
				<td><?php echo $isi_post;?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<?php 
					if($data_laporan['id_forum']!=NULL){
						if($data_post['id_balasan']==NULL){
							/* select topik Forum*/
							?>
							<a href="index.php?page=forum&id_forum=<?php echo $data_post['id_forum'];?>
							&hal=<?php echo $data_post['halaman'];?>
							#post<?php echo $data_post['id_forum'];?>">Lihat Post</a>
						<?php 
						}else{
							$datatopik= mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$data_post[id_balasan]"));
							if($datatopik['id_balasan']==NULL){
								/* select komentar Forum*/
								?>
								<a href="index.php?page=forum&id_forum=<?php echo $datatopik['id_forum'];?>
								&hal=<?php echo $data_post['halaman'];?>
								#post<?php echo $data_post['id_forum'];?>">Lihat Post</a>
								<?php 
							}else{									
								/* select balasan komentar Forum*/
								?>
								<a href="index.php?page=forum&id_forum=<?php echo $datatopik['id_balasan'];?>
								&hal=<?php echo $data_post['halaman'];?>
								#post<?php echo $data_post['id_balasan'];?>">Lihat Post</a>
								<?php 
							}
						}
					}elseif($data_laporan['id_komentar']!=NULL){
						/* select komentar Berita*/
						if($data_post['id_balasan']==NULL){
							?>
							<a href="index.php?page=berita
							&id_kategori_berita=<?php echo $data_post['id_kategori_berita'];?>
							&id_berita=<?php echo $data_post['id_berita'];?>
								&hal=<?php echo $data_post['halaman'];?>
							#post<?php echo $data_post['id_komentar'];?>">Lihat Post</a>
							<?php
						}else{
							/* select balasan komentar Berita*/
							?>
							<a href="index.php?page=berita
							&id_kategori_berita=<?php echo $data_post['id_kategori_berita'];?>
							&id_berita=<?php echo $data_post['id_berita'];?>
							&hal=<?php echo $data_post['halaman'];?>
							#post<?php echo $data_post['id_balasan'];?>">Lihat Post</a>
							<?php
						}
					}
					?>
					<a onclick="return confirm('yakin Ingin Menghapus data ?')">
					<input type="Submit" name="hapuspost" value="Hapus Post"/>
					</a>
					
				</td>
			</tr>
		</table>
	</form>
	<?php
	$hapuspost = @$_POST['hapuspost'];
	if($hapuspost){
		if($data_laporan['id_forum']!=NULL){
				mysqli_query($koneksi, "delete from forum where id_forum=$data_post[id_forum]") or die (mysqli_error());
		}elseif($data_laporan['id_komentar']!=NULL){
				mysqli_query($koneksi, "delete from komentar where id_komentar=$data_post[id_komentar]") or die (mysqli_error());
		}
		?>
		<script type="text/javascript">
		alert("Hapus Post Berhasil");
		window.location.href="?page=laporan&action=view";
		</script>
		<?php
	}
}else{
	header("location: ../index.php");
}
	?>
</fieldset>