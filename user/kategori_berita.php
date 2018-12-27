<?php
	$batas=10;
	$hal=@$_GET['hal'];
	$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from berita WHERE id_kategori_berita=$id_kategori_berita"));
	$jml_hal = ceil($jml / $batas);
	if(empty($hal) || $hal < 1){
		$posisi=0;
		$hal=1;
	}elseif($hal > $jml_hal){			
		$hal=$jml_hal;			
		$posisi=($hal-1)*$batas;
	}else{
		$posisi=($hal-1)*$batas;
	}
	$kategori_berita = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori_berita where id_kategori_berita=$id_kategori_berita"));
	echo "<h3>$kategori_berita[nama_kategori_berita]</h3>";
	$beritakategori = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_kategori_berita=$id_kategori_berita ORDER BY id_berita DESC limit $posisi, $batas") or die (mysqli_error());
	$jumlahberitakategori = mysqli_num_rows($beritakategori);
	if($jumlahberitakategori > 0){					
		while($databeritakategori=mysqli_fetch_array($beritakategori)){
			$tgl = tgl_indo($databeritakategori['tanggal']);
			?>
				<div id="item">
				<h2><a href="?page=berita&id_kategori_berita=<?php echo $databeritakategori['id_kategori_berita'];?>&id_berita=<?php echo $databeritakategori['id_berita'];?>"><?php echo $databeritakategori['judul']; ?></a></h2>
				<div class="info"> 
					<span class="date"><?php echo $databeritakategori['hari'].", ".$tgl." - ".$databeritakategori['jam']."WIB";?>
					</span>
				</div>
				<?php 
					if ($databeritakategori['gambar']!=''){
				?>
					<a href="?page=berita&id_kategori_berita=<?php echo $databeritakategori['id_kategori_berita'];?>&id_berita=<?php echo $databeritakategori['id_berita'];?>">
						<img src="foto_berita/<?php echo $databeritakategori['gambar'];?>" width="200" class="image">
					</a>
				<?php 
				}			
			$isi_berita =(strip_tags($databeritakategori['isi_berita'])); 
			$isi = substr($isi_berita,0,320); 
				?>			
			<p><?php echo $isi ?> ... 
			<a href="?page=berita&id_kategori_berita=<?php echo $databeritakategori['id_kategori_berita'];?>&id_berita=<?php echo $databeritakategori['id_berita'];?>"><button class="btn infobutton">[selengkapnya]</button></a></p>
			</div>
			<?php
			}
	}else{
		echo "Belum ada berita pada kategori ini."; 
	}?>

	<div class="pagination right">
		<?php
		echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
		$sebelumnya = $hal-1;
		$selanjutnya = $hal+1;
		if($hal>=2){
			echo "<a href='?page=berita&id_kategori_berita=$id_kategori_berita&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
		}?>
		<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<?php  
			for($i=1; $i<=$jml_hal; $i++){
			?>
				<option value="?page=berita&id_kategori_berita=<?php echo $id_kategori_berita;?>&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
					<?php echo $i;?>
				</option>
			<?php
			}
			?>
		</select>
		<?php
		if($hal!=$jml_hal){
			echo "<a href='?page=berita&id_kategori_berita=$id_kategori_berita&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
		}?>
	</div>
