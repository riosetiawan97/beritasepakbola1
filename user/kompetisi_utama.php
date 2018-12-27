<?php
$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi,"select * from kategori_kompetisi,kompetisi where 
											kategori_kompetisi.id_kategori_kompetisi = kompetisi.id_kategori_kompetisi and
											kompetisi.id_kompetisi=$id_kompetisi"));
echo $datakompetisi['nama_kategori_kompetisi']." musim "; 
$datamusim = mysqli_query($koneksi,"select * from kompetisi where 
											kompetisi.id_kategori_kompetisi=$id_kategori_kompetisi ORDER BY id_kompetisi DESC");?>
		<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<?php  
			while($arraydatamusim = mysqli_fetch_array($datamusim)){
			?>
				<option value="?page=kompetisi&id_kategori_kompetisi=<?php echo $arraydatamusim['id_kategori_kompetisi'];?>&id_kompetisi=<?php echo $arraydatamusim['id_kompetisi'];?>" <?php if ($arraydatamusim['id_kompetisi']==$id_kompetisi) echo "selected";?>>
					<?php echo $arraydatamusim['musim'];?>
				</option>
			<?php
			}
			?>
		</select>

<br>
<h4>Pertandingan</h4>
<table class="klasemen">
		<tr style="background-color:#00a8f6";>
			<th>Waktu</th>
			<th>Team 1</th>		
			<th>Score</th>		
			<th>Team 2</th>		
		</tr>
		<?php		
		$jumlah = mysqli_fetch_array(mysqli_query($koneksi, "select count(id_pertandingan) as jml from pertandingan where id_kompetisi = $id_kompetisi and
															pertandingan.status='Selesai'"));
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from pertandingan where pertandingan.id_kompetisi=$id_kompetisi"));
		$batas=10;		
		$posisi=0;		
		$jml_hal = ceil($jml / $batas);
		if($jml > 0){
		$hal=@$_GET['hal'];
			if(empty($hal) || $hal < 1){
				$cekposisi=floor($jumlah['jml']/10) * 10 ; /*untuk menghitung jumlah pertandingan yang telah selesai*/
				$cekhal=$cekposisi/10; /*untuk mengecek halaman berdasarkan pertandingan yang telah selesai*/
				if($cekhal==$jml_hal){	/*jika cekhal samadengan jml_hal*/			
					$posisi=$cekposisi - 10;
					$hal=$cekhal;
				}else{
					$posisi=$cekposisi;
					$hal=$cekhal + 1;
				}			
			}elseif($hal > $jml_hal){			
				$hal=$jml_hal;			
				$posisi=($hal-1)*$batas;
			}else{
				$posisi=($hal-1)*$batas;
			}
		}else{
			$hal=0;
		}
		$query_pertandingan = mysqli_query($koneksi, "select * from pertandingan where pertandingan.id_kompetisi=$id_kompetisi limit $posisi, $batas") or die (mysqli_error());
		$cek_pertandingan = mysqli_num_rows($query_pertandingan);
		if($cek_pertandingan < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data_pertandingan = mysqli_fetch_array($query_pertandingan)){				
			$tgl = tgl_indo($data_pertandingan['tanggal']);
			$data_team1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from team where id_team=$data_pertandingan[id_team1]"));
			$data_team2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from team where id_team=$data_pertandingan[id_team2]"));
			?>		
			<tr align="left">
				<td><?php echo $data_pertandingan['hari'].", ".$tgl." - ".$data_pertandingan['jam']." WIB";?></td>
				<td align="right"><?php echo $data_team1['nama_team']; ?></td>
				<td align="center"><?php if($data_pertandingan['status'] == "Belum Selesai"){
						echo "VS";
					}else{
						echo $data_pertandingan['score1'] ." - ". $data_pertandingan['score2'];
					}?>
				</td>
				<td align="left"><?php echo $data_team2['nama_team']; ?></td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
	<div style="margin-top:10px; float:left;">
		<?php
		$jmlpertandingan=mysqli_num_rows(mysqli_query($koneksi,"select * from pertandingan where pertandingan.id_kompetisi=$id_kompetisi "));
		echo "Jumlah Pertandingan : <b> ".$jmlpertandingan ." </b>";
		?>
	</div>
	
	<div class="pagination right">
		<?php
		echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
		$sebelumnya = $hal-1;
		$selanjutnya = $hal+1;
		if($hal>=2){
			echo "<a href='?page=kompetisi&id_kategori_kompetisi=$id_kategori_kompetisi&id_kompetisi=$id_kompetisi&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
		}?>
		<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			<?php  
			for($i=1; $i<=$jml_hal; $i++){
			?>
				<option value="?page=kompetisi&id_kategori_kompetisi=<?php echo $id_kategori_kompetisi;?>&id_kompetisi=<?php echo $id_kompetisi;?>&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
					<?php echo $i;?>
				</option>
			<?php
			}
			?>
		</select>
		<?php
		if($hal!=$jml_hal){
			echo "<a href='?page=kompetisi&id_kategori_kompetisi=$id_kategori_kompetisi&id_kompetisi=$id_kompetisi&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
		}?>
	</div>
	
<br>
<h4>Klasemen</h4>
<table class="klasemen">
<tr style="background-color:#00a8f6;">
<th>#</th>
<th>nama team</th>
<th>main</th>
<th>menang</th>
<th>seri</th>
<th>kalah</th>
<th>memasukkan</th>
<th>kemasukkan</th>
<th>selisih gol</th>
<th>poin</th>
</tr>
<?php
$no = 0;
$dataklasemen = mysqli_query($koneksi,"select * from team,klasemen where 
										team.id_team = klasemen.id_team and
										klasemen.id_kompetisi=$id_kompetisi ORDER BY poin DESC, selisih_gol DESC");
$cek_klasemen = mysqli_num_rows($dataklasemen);
	if($cek_klasemen < 1){
		?>
		<tr>
			<td colspan="10" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
		</tr>
		<?php
	}else{
		while($arrayklasemen = mysqli_fetch_array($dataklasemen)){
			$no = $no + 1;
			echo "<tr align='center'>
			<td align='center'>$no</td>
			<td align='left'>$arrayklasemen[nama_team]</td>
			<td>$arrayklasemen[main]</td>
			<td>$arrayklasemen[menang]</td>
			<td>$arrayklasemen[seri]</td>
			<td>$arrayklasemen[kalah]</td>
			<td>$arrayklasemen[memasukkan]</td>
			<td>$arrayklasemen[kemasukkan]</td>
			<td>$arrayklasemen[selisih_gol]</td>
			<td>$arrayklasemen[poin]</td>
			</tr>";
		}
	}?>
</table>