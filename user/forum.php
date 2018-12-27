<?php
if(@$_SESSION['admin']||@$_SESSION['member']){
?> 	
<a href="?page=forum&action=tambah"><button class="btn success">Tambah Topik</button></a>
<a href="?page=forum&action=infoforum"><button class="btn infobutton">Info Forum</button></a>
	<?php
}else{
	?> 
	<a href="login.php">silahkan Login untuk menambahkan Topik</a>
	<?php
	}
?> 	
	<div id="forum">
			<table width="100%" border="0px" style="border-colapse:collapse;">
		<tr style="background-color:#00a8f6";>
			<th>Topik</th>
			<th>Statistik</th>
			<th>Last Post</th>			
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
		$queryforum = mysqli_query($koneksi, "select * from forum,member where forum.id_member=member.id_member and forum.id_balasan is NULL limit $posisi, $batas") or die (mysqli_error());
		$cekforum = mysqli_num_rows($queryforum);
		if($cekforum < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Belum Ada Forum untuk saat ini</td>
			</tr>
			<?php
		}else{
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
		}
		?>
	</table>
		<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=forum&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=forum&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=forum&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
	</div>
