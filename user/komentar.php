<?php
$komentar = mysqli_fetch_array(mysqli_query($koneksi, "select count(komentar.id_komentar) as jml from komentar WHERE id_berita='$id_berita' and id_balasan is null"));
echo "<br/>$komentar[jml] Komentar <br><br>
<div class='formkomen'>";
if(@$_SESSION['admin']||@$_SESSION['member']){
		?>
		<form action="" method="post">
			<table>
				<tr>
					<td>komentar</td>
					<td> : </td>
					<td><textarea name="komentar" placeholder="Masukkan komentar" style="width: 500px; height: 50px;" required></textarea></td>
					<td><input type="Submit" name="kirim" value="Kirim"/></td>
				</tr>
			</table>
		</form>
		<?php
	}else{
	?>  
		<form action="" method="post">
			<table>
				<tr>
					<td>komentar</td>
					<td> : </td>
					<td><a href="login.php">silahkan Login untuk memberikan komentar</a></td>
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
	$komentar = @$_POST['komentar'];
	$kirim_komentar = @$_POST['kirim'];
	if($kirim_komentar){
		$komentar = mysqli_query($koneksi, "insert into komentar values('','$id_berita',NULL,'$id_member','$komentar','$hari_ini','$tgl_sekarang','$jam_komentar','')") or die (mysqli_error());
		if ($komentar) {
            echo "<script>alert('Komentar berhasil dikirimkan !');history.go(-1);</script>";
        }else{
			echo "<script>alert('Gagal menambahkan komentar !');history.go(-1);</script>";
        }
	}
	
	
	
		$batas=10;
		$hal=@$_GET['hal'];
		$jml=mysqli_num_rows(mysqli_query($koneksi,"select * from komentar where komentar.id_berita = '$id_berita' and komentar.id_balasan is NULL"));
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
	$query_komentar = mysqli_query($koneksi, "select * from komentar,member where 
												komentar.id_member=member.id_member and 
												komentar.id_berita = '$id_berita' and 
												komentar.id_balasan is NULL limit $posisi, $batas") or die (mysqli_error());
	$jumlah_komentar = mysqli_num_rows($query_komentar);
	if($jumlah_komentar > 0){	
		while($komen=mysqli_fetch_array($query_komentar)){
			mysqli_query($koneksi, "update komentar set halaman='$hal' where id_komentar=$komen[id_komentar]") or die (mysqli_error());			
			$tgl = tgl_indo($komen['tanggal']);
			$selectbalasan= mysqli_query($koneksi, "select count(komentar.id_komentar) as bls from komentar WHERE id_berita='$id_berita' and id_balasan=$komen[id_komentar]");
			$balasan = mysqli_fetch_array($selectbalasan);
			?>
			<div class="komen" id="post<?php echo $komen['id_komentar'];?>" >
				<div id="headerkomen">
					<div id="komentanggal"> 
						<?php echo  $tgl." - ".$komen['jam'];?> 
					</div>
					<div class="pilihankomen right">
						<a>&#8285 </a>
						<div class="dropdownkomen">
							<?php 
							if(@$_SESSION['member']){
								if($data_member['id_member'] == $komen['id_member']){
									?>				
										<a href="?page=editkomentar&id_komentar=<?php echo $komen['id_komentar'];?>">edit</a>
									<?php
								}else{
									?>				
										<a href="?page=laporpost&id_komentar=<?php echo $komen['id_komentar'];?>">Laporkan</a>
									<?php
								}
							}else if(@$_SESSION['admin']){
								if($data_member['id_member'] == $komen['id_member']){
									?>				
										<a href="?page=editkomentar&id_komentar=<?php echo $komen['id_komentar'];?>">edit</a>
									<?php
								}
									?>				
										<a onclick="return confirm('yakin Ingin Menghapus Komentar ?')" href="?page=hapuskomentar&id_komentar=<?php echo $komen['id_komentar'];?>">Hapus</a>
									<?php
							}else{
								?>				
									<a href="?page=laporpost&id_komentar=<?php echo $komen['id_komentar'];?>">Laporkan</a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="image">
					<?php if($komen['foto_profil']==""){?>
						<span class="helper"></span><img src="foto_member/defaultfp.png"/>
					<?php }else{?>
						<span class="helper"></span><img src="foto_member/<?php echo $komen['foto_profil'];?>"/>
					<?php }?>
				</div>
				<div id="pesankomen">
					<a><b><?php echo $komen['username']; ?></b></a>
					<span class style="color:#EA1C1C;">|</span>
					<p><?php echo $komen['komentar']; ?></p>
				</div>
				<div  class="collapsible"> 
				<a>balasan <?php echo "($balasan[bls])";?></a>
				</div>
				<div class="content">  
					<form action="" method="post">
						<table>
							<tr>
							<?php
							if(@$_SESSION['admin']||@$_SESSION['member']){
							?>
								<td>Balas</td>
								<td> : </td>
								<td><textarea name="balasan" placeholder="Masukkan Balasan" style="width: 500px; height: 50px;" required></textarea></td>
								<td><input type="Submit" name="<?php echo $komen['id_komentar'];?>" value="Kirim"/></td>
							<?php
							}else{
							?> 
								<td>Balas</td>
								<td> : </td>
								<td><a href="login.php">silahkan Login untuk memberikan balasan</a></td>
								<td><input type="Submit" name="kirim" value="Kirim" disabled=disabled/></td>
							<?php
							}
							?>
							</tr>
						</table>
					</form>
					
					<?php
					if(@$_SESSION['admin']||@$_SESSION['member']){
						$id_member = $data_member['id_member'];
					}
					$idbalasan = $komen['id_komentar'];
					$balasan = @$_POST['balasan'];
					$kirim_balasan = @$_POST[$komen['id_komentar']];
					if($kirim_balasan){
						$balasan = mysqli_query($koneksi, "insert into komentar values('','$id_berita','$idbalasan','$id_member','$balasan','$hari_ini','$tgl_sekarang','$jam_komentar','')") or die (mysqli_error());
						if($balasan) {
							echo "<script>alert('Balasan berhasil dikirimkan !');history.go(-1);</script>";
						}else{
							echo "<script>alert('Gagal menambahkan Balasan !');history.go(-1);</script>";
						}
					}
					$query_balasan = mysqli_query($koneksi, "select * from komentar,member where komentar.id_member=member.id_member and komentar.id_berita = '$id_berita' and komentar.id_balasan='$idbalasan'") or die (mysqli_error());
					$jumlahbalasan = mysqli_num_rows($query_balasan);
					if($jumlahbalasan > 0){					
						while($balasan=mysqli_fetch_array($query_balasan)){
							mysqli_query($koneksi, "update komentar set halaman='$hal' where id_komentar=$balasan[id_komentar]") or die (mysqli_error());	
							$tgl = tgl_indo($balasan['tanggal']);
							?>
							<div class="balasan">
								<div id="headerkomen">
									<div id="komentanggal"> 
										<?php echo  $tgl." - ".$balasan['jam'];?> 
									</div>
									<div class="pilihankomen right">
										<a>&#8285 </a>
										<div class="dropdownkomen">
											<?php 
											if(@$_SESSION['member']){
												if($data_member['id_member'] == $balasan['id_member']){
													?>				
													<a href="?page=editkomentar&id_komentar=<?php echo $balasan['id_komentar'];?>">edit</a>
													<?php
												}else{
													?>				
													<a href="?page=laporpost&id_komentar=<?php echo $balasan['id_komentar'];?>">Laporkan</a>
													<?php
												}
											}else if(@$_SESSION['admin']){
												if($data_member['id_member'] == $balasan['id_member']){
													?>				
														<a href="?page=editkomentar&id_komentar=<?php echo $balasan['id_komentar'];?>">edit</a>
													<?php
												}
													?>				
														<a onclick="return confirm('yakin Ingin Menghapus Komentar ?')" href="?page=hapuskomentar&id_komentar=<?php echo $balasan['id_komentar'];?>">Hapus</a>
													<?php
											}else{
												?>				
													<a href="?page=laporpost&id_komentar=<?php echo $balasan['id_komentar'];?>">Laporkan</a>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="image">
									<?php if($balasan['foto_profil']==""){?>
										<span class="helper"></span><img src="foto_member/defaultfp.png"/>
									<?php }else{?>
										<span class="helper"></span><img src="foto_member/<?php echo $balasan['foto_profil'];?>"/>
									<?php }?>
								</div>
								<div id="pesankomen">
								<a><b><?php echo $balasan['username']; ?></b></a>
								<span class style="color:#EA1C1C;">|</span>
								<p><?php echo $balasan['komentar']; ?></p>
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
	  
		<div class="pagination right">
			<?php
			echo "<div class='infohalaman'>Halaman $hal dari $jml_hal Halaman</div>";
			$sebelumnya = $hal-1;
			$selanjutnya = $hal+1;
			if($hal>1){
				echo "<a href='?page=berita&id_kategori_berita=$id_kategori_berita&id_berita=$id_berita&hal=$sebelumnya'><button style='background-color:#fff; border:1px solid #666;'>sebelumnya</button></a>";
			}?>
			<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<?php  
				for($i=1; $i<=$jml_hal; $i++){
				?>
					<option value="?page=berita&id_kategori_berita=<?php echo $id_kategori_berita;?>&id_berita=<?php echo $id_berita;?>&hal=<?php echo $i;?>" <?php if ($hal==$i) echo "selected";?>>
						<?php echo $i;?>
					</option>
				<?php
				}
				?>
			</select>
			<?php
			if($hal!=$jml_hal){
				echo "<a href='?page=berita&id_kategori_berita=$id_kategori_berita&id_berita=$id_berita&hal=$selanjutnya'><button style='background-color:#fff; border:1px solid #666;'>selanjutnya</button></a>";
			}?>
		</div>
	
	
	 <?php	
	}else{
		echo "Belum ada komentar pada berita ini."; 
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
</script>