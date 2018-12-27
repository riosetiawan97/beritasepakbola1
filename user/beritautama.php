<!---------------- BERITA UTAMA ------------------------>
<div>
<b>BERITA UTAMA </b>
</div>  
<?php    
		$batas=10;
		$hal=@$_GET['hal'];
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from berita"));
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
$beritaterbaru=mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC limit $posisi, $batas");
$jumlahberitaterbaru = mysqli_num_rows($beritaterbaru);
	if($jumlahberitaterbaru > 0){
		while($databeritaterbaru=mysqli_fetch_array($beritaterbaru)){
			 $tgl = tgl_indo($databeritaterbaru['tanggal']);
			?>
			<div id="item">
			<h2><a href="?page=berita&id_kategori_berita=<?php echo $databeritaterbaru['id_kategori_berita'];?>&id_berita=<?php echo $databeritaterbaru['id_berita'];?>"><?php echo $databeritaterbaru['judul'];?></a></h2>
			<div class="info"> 
				<span class="date"><?php echo $databeritaterbaru['hari'].", ".$tgl." - ".$databeritaterbaru['jam']."WIB";?>
				</span>
			</div>
			<?php
			if ($databeritaterbaru['gambar']!=''){
			?>
				<a href="?page=berita&id_kategori_berita=<?php echo $databeritaterbaru['id_kategori_berita'];?>&id_berita=<?php echo $databeritaterbaru['id_berita'];?>">
					<img src="foto_berita/<?php echo $databeritaterbaru['gambar'];?>" width="200" height="110"  class="image">
				</a>
				<?php
			}
			$isi_berita =(strip_tags($databeritaterbaru['isi_berita']));
			$isi = substr($isi_berita,0,300);  
			?>
			<div id="isiberita">
			<p><?php echo $isi ?> ...
			<a href="?page=berita&id_kategori_berita=<?php echo $databeritaterbaru['id_kategori_berita'];?>&id_berita=<?php echo $databeritaterbaru['id_berita'];?>"><button class="btn infobutton">[selengkapnya]</button></a></p>
			</div>
			</div>
			<?php  
		}
	}else{
		echo "Belum ada berita saat ini."; 
	}?>
	
	<div class="pagination right">
		<?php
		echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
		$sebelumnya = $hal-1;
		$selanjutnya = $hal+1;
		if($hal>=2){
			echo "<a href='?page=berita&hal=$sebelumnya'><button>sebelumnya</button></a>";
		}?>
		<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<?php  
			for($i=1; $i<=$jml_hal; $i++){
			?>
				<option value="?page=berita&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
					<?php echo $i;?>
				</option>
			<?php
			}
			?>
		</select>
		<?php
		if($hal!=$jml_hal){
			echo "<a href='?page=berita&hal=$selanjutnya'><button>selanjutnya</button></a>";
		}?>
	</div>
