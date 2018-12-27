<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Tampil Data Topik Forum</legend>
	<div style="margin-top:15px; float:left; display: inline-table;">
		<a href="index.php?page=forum&action=tambah"><button class="btn success">Tambah Topik</button></a>
	</div>
	<div style="margin-top:15px; float:right; display: inline-table;">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="cari judul forum ..." style="width:200px; padding:5px;" />
			<input type="submit" name="cari_forum" value="Cari"style="padding:3px;"/>
		</form>
	</div>
	<div id="forum"><br>
		<table width="100%" border="0px" style="border-colapse:collapse;">
			<tr style="background-color:#00a8f6";>
				<th>Topik</th>
				<th>Statistik</th>
				<th>Last Post</th>
				<th>Opsi</th>			
			</tr>
			<?php		
			$batas=10;
			$hal=@$_GET['hal'];
			$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from forum where forum.id_balasan is NULL"));
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
			$cari_forum=@$_POST['cari_forum'];
			if($cari_forum){
				if($inputan_pencarian !=""){
					$query_forum = mysqli_query($koneksi, "select * from forum,member where 
															(forum.judulforum or forum.isi_forum like '%$inputan_pencarian%') and
															forum.id_member=member.id_member and 
															forum.id_balasan is NULL 
															ORDER BY id_forum DESC") or die (mysqli_error());
				}else{
					$query_forum = mysqli_query($koneksi, "select * from forum,member where forum.id_member=member.id_member and forum.id_balasan is NULL limit $posisi, $batas") or die (mysqli_error());
				}
			}else{
				$query_forum = mysqli_query($koneksi, "select * from forum,member where forum.id_member=member.id_member and forum.id_balasan is NULL limit $posisi, $batas") or die (mysqli_error());
			}
			$no = $posisi+1;
			$cek_forum = mysqli_num_rows($query_forum);
			if($cek_forum < 1){
				?>
				<tr>
					<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
				</tr>
				<?php
			}else{
				while($data_forum = mysqli_fetch_array($query_forum)){
					$maxhal = mysqli_fetch_array(mysqli_query($koneksi, "select max(halaman) from forum where id_forum=$data_forum[id_forum] or id_balasan=$data_forum[id_forum]"));
				?>		
				<tr align="left">
					<td><a href="index.php?page=forum&id_forum=<?php echo $data_forum['id_forum'];?>"><?php echo $data_forum['judulforum'] ?></a>
						<?php echo "<br> by : 	". $data_forum['username'].", ".  $data_forum['tanggal'] .' ' .$data_forum['jam'];?>
					</td>
					<td><?php echo "dibaca : ".$data_forum['dibaca'];?></td>
					<td><a href="index.php?page=forum&id_forum=<?php echo $data_forum['id_forum'];?>&hal=<?php echo $maxhal[0];?>">Last Page</a></td>
					<td>
					<a onclick="return confirm('yakin Ingin Menghapus data ?')" href="?page=forum&action=hapus&id_forum=<?php echo $data_forum['id_forum'];?>"><button class="btn danger">Hapus</button></a>
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
				echo "<a href='?page=forum&action=view&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=forum&action=view&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=forum&action=view&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
	</div>
	
</fieldset>
	<?php
}else{
	header("location: ../index.php");
}?>