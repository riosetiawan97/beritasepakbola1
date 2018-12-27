<?php
	$databerita = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM berita,kategori_berita WHERE kategori_berita.id_kategori_berita=berita.id_kategori_berita AND berita.id_berita=$id_berita"));
	$tgl = tgl_indo($databerita['tanggal']);
	$baca = $databerita['dibaca']+1;
	mysqli_query($koneksi, "UPDATE berita SET dibaca=$databerita[dibaca]+1 WHERE id_berita=$id_berita");
?>	
	<div class="post">
    <h4><a href="?page=berita&id_kategori_berita=<?php echo $databerita['id_kategori_berita']; ?>"><button class="btn success"><?php echo $databerita['nama_kategori_berita'];?></button></a></h4>	
	<h2><?php echo $databerita['judul'];?></h2>
		<div class="info"> 
			<span class="date">
				<b><?php echo $databerita['sumber'];?></b> 
				<span class style="color:#EA1C1C;">|</span> 
				<?php echo $databerita['penulis'];?> 
				<span class style="color:#EA1C1C;">|</span> 
				<?php echo $baca." x Dibaca";?> 
			</span>
			<br>
		<span class="date">
		<?php echo $databerita['hari'].", ".$tgl." - ".$databerita['jam']." WIB";?>
			</span>
		</div>		
  <p><?php echo $databerita['isi_berita'];?></p>
  <center><a target="_blank" href="<?php echo $databerita['url']; ?>"><button class="btn infobutton">Lihat Sumber Asli</button></a></center>
  </div>
  <?php
	include "user/komentar.php";
  ?>
