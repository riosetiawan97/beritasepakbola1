<?php
if(@$_SESSION['admin']){
?>
<fieldset class="datamember">
	<legend>Tampil Data member</legend>
	<div style="margin-top:15px; float:left; display: inline-table;">
		<a href="?page=member&action=tambah"><button class="btn success">Tambah member</button></a>
	</div>
	<div style="margin-top:15px; float:right; display: inline-table;">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="cari username / email ..." style="width:200px; padding:5px;" />
			<input type="submit" name="cari_member" value="Cari"style="padding:3px;"/>
		</form>
	</div>
	<table width="100%" border="1px" style="border-colapse:collapse;">
		<tr style="background-color:#00a8f6";>
			<th>#</th>
			<th>Foto</th>
			<th>Email</th>
			<th>Username</th>
			<th>Nama Lengkap</th>
			<th>Status</th>
			<th>Opsi</th>
		</tr>
		<?php
		
		$batas=10;
		$hal=@$_GET['hal'];
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from member where level ='member'"));
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
		$cari_member=@$_POST['cari_member'];
		if($cari_member){
			if($inputan_pencarian !=""){
				$query_member = mysqli_query($koneksi, "select * from member where (email like '%$inputan_pencarian%' or username like '%$inputan_pencarian%') and level ='member' ORDER BY id_member DESC") or die (mysqli_error());
			}else{
				$query_member = mysqli_query($koneksi, "select * from member where level ='member' ORDER BY id_member DESC limit $posisi, $batas") or die (mysqli_error());
			}
		}else{
			$query_member = mysqli_query($koneksi, "select * from member where level ='member' ORDER BY id_member DESC limit $posisi, $batas") or die (mysqli_error());
		}
		$no = $posisi+1;
		$cek_member = mysqli_num_rows($query_member);
		if($cek_member < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
			</tr>
			<?php
		}else{
			while($data_member = mysqli_fetch_array($query_member)){
			?>		
			<tr align="center">
				<td align="center"><?php echo $no++.".";?></td>
				<td><div class="image">
						<?php if($data_member['foto_profil']==""){?>
							 <span class="helper"></span><img src="foto_member/defaultfp.png"/>
						<?php }else{?>
							 <span class="helper"></span><img src="foto_member/<?php echo $data_member['foto_profil'];?>"/>
						<?php }?>
					</div>
				</td>
				<td><?php echo $data_member['email'];?></td>
				<td><?php echo $data_member['username'];?></td>
				<td><?php echo $data_member['nama_lengkap'];?></td>
				<td><?php echo $data_member['status'];?></td>
				<td>
				<a href="?page=member&action=edit&idmember=<?php echo $data_member['id_member'];?>"><button class="btn info">Edit</button></a>
				</td>
			</tr>
			<?php	
			}
		}
		?>
	</table>
	<div style="margin-top:10px; float:left;">
		<?php
		echo "Jumlah Member : <b> ".$jml ." </b>";
		?>
	</div>
	<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=member&action=view&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=member&action=view&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=member&action=view&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
</fieldset>
<?php
}else{
	header("location: ../index.php");
}?>