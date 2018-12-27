<?php
if(@$_SESSION['admin']){
?>
<fieldset>
	<legend>Laporan</legend>
	<table width="100%" border="1px" style="border-colapse:collapse;">
		<tr style="background-color:#00a8f6";>
			<th>Waktu</th>
			<th>Pelapor</th>
			<th>Isi Laporan</th>
			<th>Opsi</th>
		</tr>
		<?php	
		$batas=10;
		$hal=@$_GET['hal'];
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from laporan"));
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
		$query_laporan = mysqli_query($koneksi, "select * from laporan limit $posisi, $batas") or die (mysqli_error());
		$cek_laporan = mysqli_num_rows($query_laporan);
		if($cek_laporan < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data_laporan = mysqli_fetch_array($query_laporan)){
				$tgl = tgl_indo($data_laporan['tanggal']);
			if($data_laporan['id_member_pelapor']!=NULL){
				$sql_laporan_user = mysqli_query($koneksi, "select * from member,laporan where member.id_member=$data_laporan[id_member_pelapor]") or die (mysqli_error());
				$data_laporan_user = mysqli_fetch_array($sql_laporan_user);
				$pelapor = $data_laporan_user['username'];
			}else{
				$pelapor = 'unknown';
			} 
			?>		
			<tr align="center">
				<td><?php echo $tgl." - ".$data_laporan['jam']." WIB";?></td>
				<td><?php echo $pelapor;?></td>
				<td><?php echo $data_laporan['isi_laporan'];?></td>
				<td>
				<a href="?page=laporan&action=viewlaporan&idlaporan=<?php echo $data_laporan['id_laporan'];?>"><button class="btn success">Lihat Laporan</button></a>
				<a onclick="return confirm('yakin Ingin Menghapus data ?')" href="?page=laporan&action=hapus&idlaporan=<?php echo $data_laporan['id_laporan'];?>"><button class="btn danger">Hapus</button></a>
				</td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
	<div style="margin-top:10px; float:left;">
		<?php
		echo "Jumlah Laporan : <b> ".$jml ." </b>";
		?>
	</div>
	<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=laporan&action=view&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=laporan&action=view&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=laporan&action=view&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>