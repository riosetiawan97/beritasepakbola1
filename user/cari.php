<?php    
	$batas=10;
	$hal=@$_GET['hal'];
	$inputan_pencarian=@$_GET['cari'];
	$jenis=@$_GET['jenis'];
	if($jenis =="berita"){
	$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from berita where (judul like '%$inputan_pencarian%' or isi_berita like '%$inputan_pencarian%') ORDER BY id_berita DESC"));
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
			echo "<b>Hasil pencarian Berita : $inputan_pencarian </b>";
			$querycariberita = mysqli_query($koneksi, "select * from berita, kategori_berita where (judul like '%$inputan_pencarian%' or isi_berita like '%$inputan_pencarian%') and  berita.id_kategori_berita=kategori_berita.id_kategori_berita ORDER BY id_berita DESC limit $posisi, $batas") or die (mysqli_error());
		
		$jumlahberita = mysqli_num_rows($querycariberita);
		if($jumlahberita > 0){
			while($arraycariberita=mysqli_fetch_array($querycariberita)){
				 $tgl = tgl_indo($arraycariberita['tanggal']);
				?>
				<div id="item">
					<h2><a href="?page=berita&id_kategori_berita=<?php echo $arraycariberita['id_kategori_berita'];?>&id_berita=<?php echo $arraycariberita['id_berita'];?>"><?php echo $arraycariberita['judul'];?></a></h2>
					<div class="info"> 
						<span class="date"><?php echo $arraycariberita['hari'].", ".$tgl." - ".$arraycariberita['jam']."WIB";?>
						</span>
					</div>
					<?php
					if ($arraycariberita['gambar']!=''){
					?>
						<a href="?page=berita&id_kategori_berita=<?php echo $arraycariberita['id_kategori_berita'];?>&id_berita=<?php echo $arraycariberita['id_berita'];?>">
							<img src="foto_berita/<?php echo $arraycariberita['gambar'];?>" width="200"  class="image">
						</a>
						<?php
					}
					$isi_berita =(strip_tags($arraycariberita['isi_berita']));
					$isi = substr($isi_berita,0,300); 
					$isi = substr($isi_berita,0,strrpos($isi," ")); 
					?>
					<p><?php echo $isi ?> ...
					<a href="?page=berita&id_kategori_berita=<?php echo $arraycariberita['id_kategori_berita'];?>&id_berita=<?php echo $arraycariberita['id_berita'];?>"><button class="btn infobutton">[selengkapnya]</button></a></p>
				</div>
				<?php  
			}
		}else{
			echo "<br>Tidak Ada Data yang Cocok."; 
		}?>
				
	<?php 
	}else if($jenis =="forum"){
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from forum where 
															(judulforum like '%$inputan_pencarian%' or isi_forum like '%$inputan_pencarian%') and
															forum.id_balasan is NULL 
															ORDER BY id_forum DESC"));
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
			echo "<b>Hasil pencarian Forum : $inputan_pencarian </b>";			
				$queryforum = mysqli_query($koneksi, "select * from forum,member where 
														(forum.judulforum like '%$inputan_pencarian%' or forum.isi_forum like '%$inputan_pencarian%') and
														forum.id_member=member.id_member and 
														forum.id_balasan is NULL 
														ORDER BY id_forum DESC 
														limit $posisi, $batas") or die (mysqli_error());
		
			?>
		<div id="forum">
			<table width="100%" border="0px" style="border-colapse:collapse;">
				<tr style="background-color:#00a8f6";>
					<th>Topik</th>
					<th>Statistik</th>
					<th>Last Post</th>			
				</tr>
				<?php
				$cekforum = mysqli_num_rows($queryforum);
				if($cekforum > 0){					
					while($dataforum = mysqli_fetch_array($queryforum)){
						$maxhal = mysqli_fetch_array(mysqli_query($koneksi, "select max(halaman) from forum where id_forum=$dataforum[id_forum] or id_balasan=$dataforum[id_forum]"));
						?>		
						<tr align="left">
							<td><a href="?page=forum&id_forum=<?php echo $dataforum['id_forum'];?>"><?php echo $dataforum['judulforum'] ?></a><?php echo "<br> by : 	". $dataforum['username'].", ".  $dataforum['tanggal'] .' ' .$dataforum['jam'];?></td>
							<td><?php echo "dibaca : ".$dataforum['dibaca'];?></td>
							<td><a href="?page=forum&id_forum=<?php echo $dataforum['id_forum'];?>&hal=<?php echo $maxhal[0];?>">Last Page</a></td>
						</tr>
						<?php	
					}
				}else{
					?>
					<tr>
						<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	<?php
	}else{
		echo "<br>Halaman Tidak Ditemukan"; 
	}	
	?>	

		<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>=2){
				echo "<a href='?cari=$inputan_pencarian&jenis=$jenis&hal=$sebelumnya'><button>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?cari=<?php echo $inputan_pencarian;?>&jenis=<?php echo $jenis;?>&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?cari=$inputan_pencarian&jenis=$jenis&hal=$selanjutnya'><button>selanjutnya</button></a>";
			}?>
		</div>	
