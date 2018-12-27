	<?php
	$batas=10;
	$hal=@$_GET['hal'];
		$jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM forum WHERE forum.id_forum=$id_forum or forum.id_balasan=$id_forum"));
		$jml_hal = ceil($jml / $batas);
		if(empty($hal) || $hal <= 1){
			$posisi=0;
			$hal=1;
			$no = 0;
		}elseif($hal > $jml_hal){			
			$hal=$jml_hal;			
			$posisi=($hal-1)*$batas;			
			$no = 1;
		}else{
			$posisi=($hal-1)*$batas;
			$no = 1;
		}	
		$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM forum WHERE id_forum=$id_forum"));
		$baca = $dataforum['dibaca']+1;
		mysqli_query($koneksi, "UPDATE forum SET dibaca=$baca WHERE id_forum=$id_forum");
		$queryforum=mysqli_query($koneksi, "SELECT * FROM member,forum WHERE 
										forum.id_member=member.id_member 
										and (forum.id_forum=$id_forum or forum.id_balasan=$id_forum) 
										ORDER BY id_forum ASC limit $posisi, $batas");
		while($arrayforum = mysqli_fetch_array($queryforum)){
			$tgl = tgl_indo($arrayforum['tanggal']);
			$i = $no++; 	
			mysqli_query($koneksi, "UPDATE forum SET halaman=$hal WHERE id_forum=$arrayforum[id_forum]");
			$querybalasan = mysqli_query($koneksi, "SELECT * FROM member,forum WHERE forum.id_member=member.id_member and id_balasan=$arrayforum[id_forum]") or die (mysqli_error());
			$jumlahbalasan = mysqli_num_rows($querybalasan);
			?>		
			<div class="postforum" id="post<?php echo $arrayforum['id_forum'];?>" >
				<div id="headerforum">
					<div id="forumtanggal">
						<?php echo $arrayforum['hari'].", ".$tgl." - ".$arrayforum['jam']." WIB";?>
					</div>
					<div class="pilihan right">
						<a>&#8285 </a>
						<div class="dropdownforum">
							<?php 
						if(@$_SESSION['member']){
							if($data_member['id_member'] == $arrayforum['id_member']){
								?>				
									<a href="?page=editforum&id_forum=<?php echo $arrayforum['id_forum'];?>">Edit</a>
								<?php
							}else{
								?>				
									<a href="?page=laporpost&id_forum=<?php echo $arrayforum['id_forum'];?>">Laporkan</a>
								<?php
							}
						}else if(@$_SESSION['admin']){
							if($data_member['id_member'] == $arrayforum['id_member']){
									?>				
										<a href="?page=editforum&id_forum=<?php echo $arrayforum['id_forum'];?>">Edit</a>
									<?php
								}
							?>				
							<a onclick="return confirm('yakin Ingin Menghapus Forum ?')" href="?page=hapusforum&id_forum=<?php echo $arrayforum['id_forum'];?>">Hapus</a>
							<?php
						}else{
							?>				
							<a href="?page=laporpost&id_forum=<?php echo $arrayforum['id_forum'];?>">Laporkan</a>
							<?php
						}
						?>
						</div>
					</div>
				</div>
				
				<?php
				if($arrayforum['id_balasan']==NULL){
					?>	
					<div id="foruminfo">
						<div class="image">
							<?php if($arrayforum['foto_profil']==""){?>
								 <span class="helper"></span><img src="foto_member/defaultfp.png"/>
							<?php }else{?>
								 <span class="helper"></span><img src="foto_member/<?php echo $arrayforum['foto_profil'];?>"/>
							<?php }?>
						</div>
							<div class="penulis">
								<b><?php echo $arrayforum['username']; ?></b> 
							</div>
						<div class="clear"></div>
					</div>
					<div id="isiforum">
						<h2><?php echo $arrayforum['judulforum'];?></h2>		
						<p><?php echo $arrayforum['isi_forum'];?></p>
					</div>	
		
					<?php
				}else{
				?>	
				<div id="isiforumb">
					<div id="foruminfob">
					<div class="image">
						<?php if($arrayforum['foto_profil']==""){?>
							<span class="helper"></span><img src="foto_member/defaultfp.png"/>
						<?php }else{?>
							<span class="helper"></span><img src="foto_member/<?php echo $arrayforum['foto_profil'];?>"/>
						<?php }?>
					</div>
						<div class="penulis">
							<b><?php echo $arrayforum['username']; ?></b> 
						</div>
					</div>
					<div id="pesanforum">	
						<p><?php echo $arrayforum['isi_forum'];?></p>
					</div>
				</div>
				
				<div id="footerforum">
					<div class="collapsible"> 
						<a>balasan <?php echo "($jumlahbalasan)";?></a>
					</div>
					<div class="content">  
						<form action="" method="post">
							<?php
							if(@$_SESSION['admin']||@$_SESSION['member']){
							?>
							<br><textarea name="isi_topik" placeholder="Masukkan Balasan" id="text<?php echo $i;?>" style="width: 500px; height: 50px;" required></textarea>
							<br><input type="Submit" name="<?php echo $arrayforum['id_forum'];?>" value="Kirim"/>
							<?php
							}else{
							?>  
							<table>
								<tr>
									<td>Balas</td>
									<td> : </td>
									<td><a href="login.php">silahkan Login untuk memberikan balasan untuk post ini</a></td>
									<td><input type="Submit" name="kirim" value="Kirim" disabled=disabled/></td>
								</tr>
							</table>
							<?php
							}
							?>
						</form>
						<?php
						if($jumlahbalasan > 0){
							while($arraybalasan=mysqli_fetch_array($querybalasan)){
								$tgl = tgl_indo($arraybalasan['tanggal']);
								mysqli_query($koneksi, "UPDATE forum SET halaman=$hal WHERE id_forum=$arraybalasan[id_forum]");
								?>
								<div class="balasanforum">
									<div class="komenforum">
										<div id="headerforum">
										<div id="forumtanggal"> 
											<?php echo  $arraybalasan['hari'].", ".$tgl." - ".$arraybalasan['jam'];?> 
										</div>
										<div class="pilihan right">
											<a>&#8285 </a>
											<div class="dropdownforum">
												<?php 
											if(@$_SESSION['member']){
												if($data_member['id_member'] == $arraybalasan['id_member']){
													?>				
														<a href="?page=editforum&id_forum=<?php echo $arraybalasan['id_forum'];?>">Edit</a>
													<?php
												}else{
													?>				
														<a href="?page=laporpost&id_forum=<?php echo $arraybalasan['id_forum'];?>">Laporkan</a>
													<?php
												}
											}else if(@$_SESSION['admin']){
												if($data_member['id_member'] == $arraybalasan['id_member']){
													?>				
														<a href="?page=editforum&id_forum=<?php echo $arraybalasan['id_forum'];?>">Edit</a>
													<?php
												}
												?>				
												<a onclick="return confirm('yakin Ingin Menghapus Forum ?')" href="?page=hapusforum&id_forum=<?php echo $arraybalasan['id_forum'];?>">Hapus</a>
												<?php
											}else{
												?>				
												<a href="?page=laporpost&id_forum=<?php echo $arraybalasan['id_forum'];?>">Laporkan</a>
												<?php
											}
											?>
											</div>
										</div>
										</div>
											<div class="image">
												<?php if($arraybalasan['foto_profil']==""){?>
													<span class="helper"></span><img src="foto_member/defaultfp.png"/>
												<?php }else{?>
													<span class="helper"></span><img src="foto_member/<?php echo $arraybalasan['foto_profil'];?>"/>
												<?php }?>
											</div>
											<b><?php echo $arraybalasan['username']; ?></b> 
										<span class style="color:#EA1C1C;">|</span>
										<div id="isiforumkomen">
											<?php echo $arraybalasan['isi_forum']; ?>
										</div>
									</div>
								</div>
								<?php	
							}
						}		
					?>
					</div>					
				</div>	

				<?php
				}
				?>			
			</div>  		 
			<?php	
			if(@$_SESSION['admin']||@$_SESSION['member']){
				$id_member = $data_member['id_member'];
			}
			$isitopik = @$_POST['isi_topik'];
			$kirim_balasan1 = @$_POST[$arrayforum['id_forum']];
			if($kirim_balasan1){	
				if($isitopik==""){
					?><script type="text/javascript">alert('Inputan tidak Boleh Ada yang Kosong');history.go(-1);</script><?php
				}else{
					$balasan = mysqli_query($koneksi, "insert into forum values('','$arrayforum[id_forum]','$id_member','','$isitopik','$hari_ini','$tgl_sekarang','$jam_komentar','','')") or die (mysqli_error());
					if ($balasan) {
						echo "<script>alert('balasan berhasil dikirimkan !');history.go(-1);</script>";
					}else{
						echo "<script>alert('Gagal menambahkan balasan !');history.go(-1);</script>";
					}
				}
			}
		}
	  ?>
	  
		<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=forum&id_forum=$id_forum&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=forum&id_forum=<?php echo $id_forum;?>&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=forum&id_forum=$id_forum&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
	
	
	 <?php
	echo "<div class='formbalas'>";
if(@$_SESSION['admin']||@$_SESSION['member']){
	?>
	<form action="" method="post">
	<div id="forumbalas">
	Balas : <br></div>
	<div class="text">
				<textarea name="isi_topik" id="isi_topik" style="width: 500px; height: 350px;" required></textarea><br>
				<input type="Submit" name="kirim" value="Kirim"/></div>
	</form>
	<?php
	}else{
	?>  
	<form action="" method="post">
		<table>
			<tr>
				<td>Balas</td>
				<td> : </td>
				<td><a href="login.php">silahkan Login untuk memberikan balasan untuk topik ini</a></td>
				<td><input type="Submit" name="kirim" value="Kirim" disabled=disabled/></td>
			</tr>
		</table>
	</form>
	<?php
	}	
echo "</div>";	
if(@$_SESSION['admin']||@$_SESSION['member']){
	$id_member = $data_member['id_member'];
	}
	$isitopik = @$_POST['isi_topik'];
	$kirim_balasan = @$_POST['kirim'];
	if($kirim_balasan){
		if($isitopik==""){
			?><script type="text/javascript">alert('Inputan tidak Boleh Ada yang Kosong');history.go(-1);</script><?php
		}else{
			$balasan = mysqli_query($koneksi, "insert into forum values('','$id_forum','$id_member','','$isitopik','$hari_ini','$tgl_sekarang','$jam_komentar','','')") or die (mysqli_error());
			if ($balasan) {
				echo "<script>alert('balasan berhasil dikirimkan !');history.go(-1);</script>";
			}else{
				echo "<script>alert('Gagal menambahkan balasan !');history.go(-1);</script>";
			}
		}
	}
?>
  

	
	<script>  				
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
			}
		});
	}
	CKEDITOR.replace( 'isi_topik',
					{filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/gambar_forum/',
					height: '300'});
		for(var i=1;i<=10;i++){
			CKEDITOR.replace('text' + i, {filebrowserUploadUrl: 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/gambar_forum/',
			height: '100'})};
    </script>