<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Tampil Data Berita</legend>
	<div style="margin-top:15px; float:left; display: inline-table;">
			<a href="?page=berita&action=tambah"><button class="btn success">Tambah Berita</button></a>
	</div>
	<div style="margin-top:15px; float:right; display: inline-table;">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="masukkan Judul / isi berita ..." style="width:200px; padding:5px;" />
			<input type="submit" name="cari_berita" value="Cari"style="padding:3px;"/>
		</form>
	</div>
	<table width="100%" border="1px" style="border-colapse:collapse;">
		<tr style="background-color:#69ff00";>
			<th>Id Berita</th>
			<th>Kategori</th>
			<th>Judul</th>
			<th>Gambar</th>
			<th style="width:120px;" >Opsi</th>
		</tr>
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
		
		$inputan_pencarian= @$_POST['inputan_pencarian'];
		$cari_berita=@$_POST['cari_berita'];
		if($cari_berita){
			if($inputan_pencarian !=""){
				$queryberita = mysqli_query($koneksi, "select * from berita, kategori_berita where (judul like '%$inputan_pencarian%' or isi_berita like '%$inputan_pencarian%') and  berita.id_kategori_berita=kategori_berita.id_kategori_berita ORDER BY id_berita DESC limit $posisi, $batas") or die (mysqli_error());
			}else{
				$queryberita = mysqli_query($koneksi, "select * from berita, kategori_berita where berita.id_kategori_berita=kategori_berita.id_kategori_berita ORDER BY id_berita DESC limit $posisi, $batas") or die (mysqli_error());
			}
		}else{
			$queryberita = mysqli_query($koneksi, "select * from berita, kategori_berita where berita.id_kategori_berita=kategori_berita.id_kategori_berita ORDER BY id_berita DESC limit $posisi, $batas") or die (mysqli_error());
		}
		$cek = mysqli_num_rows($queryberita);
		if($cek < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data = mysqli_fetch_array($queryberita)){
			?>		
			<tr align="center" style="height:80px;">
				<td><?php echo $data['id_berita'];?></td>
				<td><?php echo $data['nama_kategori_berita'];?></td>
				<td><?php echo $data['judul'];?></td>
				<td><img src="foto_berita/<?php echo $data['gambar'];?>" width="120px" /></td>
				<td>
				<a href="?page=berita&action=edit&kdberita=<?php echo $data['id_berita'];?>"><button class="btn info">Edit</button></a>
				<a onclick="return confirm('yakin Ingin Menghapus data ?')" href="?page=berita&action=hapus&kdberita=<?php echo $data['id_berita'];?>"><button class="btn danger">Hapus</button></a>
				</td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
	<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=berita&action=view&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=berita&action=view&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=berita&action=view&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>