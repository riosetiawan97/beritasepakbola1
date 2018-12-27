<?php
@session_start();
include "config/koneksi.php";
include "config/waktu.php";
?>
<html>
<head>
<?php
include "header.php";
?>
</head>
<body>
	<div id="canvas">
		<div id="header">
			<img src="header.jpg" style="height:100%; width:1200px;"></img>
		</div>
		<div id="menu">
			<div class="utama"><a href="index.php">Home</a></div>		
			<?php
			$query 	= mysqli_query($koneksi, "SELECT * FROM kategori_berita") or die (mysqli_error());
			while ($kategori_berita = mysqli_fetch_array($query)) {
				?>
				<div class="utama">
					<a href="?page=berita&id_kategori_berita=<?php echo $kategori_berita['id_kategori_berita']; ?>"><?php echo $kategori_berita['nama_kategori_berita']; ?></a>
				</div>	
				<?php
			}
			?>
			<div class="utama">
				<a>Kompetisi</a>
				<div class="dropdownkiri">
					<?php
					$query_kategori_kompetisi=mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi") or die (mysqli_error()); 
					while($data_kategori_kompetisi=mysqli_fetch_array($query_kategori_kompetisi)){
						$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select max(kompetisi.id_kompetisi),kategori_kompetisi.nama_kategori_kompetisi,kompetisi.musim from 
																		kategori_kompetisi,kompetisi where
																		kompetisi.id_kategori_kompetisi = kategori_kompetisi.id_kategori_kompetisi and 
																		kompetisi.id_kategori_kompetisi = $data_kategori_kompetisi[id_kategori_kompetisi]"));
						$id_kompetisi_terbaru = ($datakompetisi[0]);
						?>
						<a href="?page=kompetisi&id_kategori_kompetisi=<?php echo $data_kategori_kompetisi['id_kategori_kompetisi'];?>&id_kompetisi=<?php echo $id_kompetisi_terbaru;?>"><?php echo $data_kategori_kompetisi['nama_kategori_kompetisi']; ?></a>
						<?php
					}
					?>
				</div>
			</div>	
			<div class="utama"><a href="?page=forum">Forum</a></div>
				<?php
				if(@$_SESSION['admin']||@$_SESSION['member']){?>
					<div class="utama right">
						<?php
						if(@$_SESSION['admin']){
							$member_terlogin = @$_SESSION['admin'];
						}else if(@$_SESSION['member']){
							$member_terlogin = @$_SESSION['member'];
						}
						$data_member = mysqli_fetch_array(mysqli_query($koneksi, "select * from member where id_member = '$member_terlogin'"));
						?>
						<a><?php echo $data_member['nama_lengkap'];?></a>
						<div class="dropdownkanan">
							<?php
							if(@$_SESSION['admin']){
							?>
							<a href="indexadmin.php">Halaman Admin</a>
							<?php
							}
							?>
							<a href="?page=editprofil">Edit Profil Saya</a>						
							<a style="background-color: #f60;" href="logout.php">Logout</a>
						</div>
					</div>
				<?php
				}else{
				?>
					<div class="utama right"><a href="login.php">Login</a></div>
					<div class="utama right"><a href="register.php">Register</a></div>
				<?php
				}
				?>
		</div>
		<div id="isi">
		
			<div id="sidebar_left">
			<?php
				include "isi.php";
			?>
			</div>	
			
			<div id="sidebar_right">
					
		<div id="tabpencarian">
			<div id="formpencarian">
				<form action="" method="get">
				<table>
					<tr>
					<td>Cari</td>	
					<td> : <input type="text" name="cari" placeholder="Cari Forum/berita" style="width:250px; padding:5px;" required /></td>
					</tr>
					<tr>
					<td><a>Jenis</a></td>		
					<td> : <select name="jenis" style="padding:5px;">
							<option value="berita">Berita</option>
							<option value="forum">Forum</option>
						</select>
					</td>
					</tr>					
					<td><input type="submit" value="Cari" style="padding:5px;"/></td>
					<tr>
					</tr>
				</table>
				</form>
			</div>	
		</div>
			
				<div id="tab_berita">		
					<div class="tab">
						<button class="tablinksberita" onclick="openberita(event, 'populer')" id="defaultOpenberita">Berita Terpopuler</button>
						<button class="tablinksberita" onclick="openberita(event, 'terbaru')">Berita Terbaru</button>
					</div>
					<div id="populer" class="tabcontentberita">
						<div class="list">
							<?php 
							$query_berita_populer=mysqli_query($koneksi, "SELECT * FROM berita ORDER BY dibaca DESC LIMIT 5"); 				  
							while($data_berita_populer=mysqli_fetch_array($query_berita_populer)){			  
								echo "
								<div class='item'>
								<div class='image'>
								<a href='?page=berita&id_kategori_berita=$data_berita_populer[id_kategori_berita]&id_berita=$data_berita_populer[id_berita]'>
								<img src='foto_berita/$data_berita_populer[gambar]' width=60 height=50 border=0></a>
								</div>";
								
								echo "<div class='text'>
								<a href='?page=berita&id_kategori_berita=$data_berita_populer[id_kategori_berita]&id_berita=$data_berita_populer[id_berita]'>$data_berita_populer[judul]</a>
								<p><span class='tanggal01'>dibaca : $data_berita_populer[dibaca] pembaca</span></p></div>
								</div>";
							}
							?>
						</div>
					</div>
					<div id="terbaru" class="tabcontentberita">
						<div class="list">
							<?php 
							$query_berita_terbaru=mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5"); 					
							while($data_berita_populer=mysqli_fetch_array($query_berita_terbaru)){	
							$tgl = tgl_indo($data_berita_populer['tanggal']);					
								echo "
								<div class='item'>
								<div class='image'>
								<a href='?page=berita&id_kategori_berita=$data_berita_populer[id_kategori_berita]&id_berita=$data_berita_populer[id_berita]'>
								<img src='foto_berita/$data_berita_populer[gambar]' width=60 height=50 border=0></a>
								</div>";
								
								echo "<div class='text'>
								<a href='?page=berita&id_kategori_berita=$data_berita_populer[id_kategori_berita]&id_berita=$data_berita_populer[id_berita]'>$data_berita_populer[judul]</a>
								<p><span class='tanggal01'>$tgl - $data_berita_populer[jam] WIB</span></p></div>
								</div>";
							}
							?>
						</div>
					</div>
				</div> 
				
				<div id="tab_forum">		
					<div class="tab">
						<button class="tablinksforum" onclick="openforum(event, 'populerforum')" id="defaultOpenforum">Forum Terpopuler</button>
						<button class="tablinksforum" onclick="openforum(event, 'terbaruforum')">Forum Terbaru</button>
					</div>
					<div id="populerforum" class="tabcontentforum">
						<div class="list">					
							<?php 
							$sql=mysqli_query($koneksi, "SELECT * FROM forum where id_balasan is NULL ORDER BY dibaca DESC LIMIT 5"); 				  
							while($p=mysqli_fetch_array($sql)){						
								echo "
								<div class='itemforum'>
								<div class='text'>
								<a href='?page=forum&id_forum=$p[id_forum]'>$p[judulforum]</a>
								<p><span class='tanggal01'><span> dibaca : $p[dibaca] pembaca</span></p></div>
								</div>";
							}
							?>
						</div>
					</div>
					<div id="terbaruforum" class="tabcontentforum">
						<div class="list">
							<?php 
							$sql=mysqli_query($koneksi, "SELECT * FROM forum where id_balasan is NULL ORDER BY id_forum DESC LIMIT 5"); 					
							while($p=mysqli_fetch_array($sql)){	
							$tgl = tgl_indo($p['tanggal']);					
								echo "
								<div class='itemforum'>
								<div class='text'>
								<a href='?page=forum&id_forum=$p[id_forum]'>$p[judulforum]</a>
								<p><span class='tanggal01'>$tgl - $p[jam] WIB</p></div>
								</div>";
							}
							?>
						</div>
					</div>
				</div>
			
				<div id="tab_klasemen">
					 <!-- Tab links -->
					<div class="tab">
						<?php 
						$query_kategori_kompetisi=mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi"); 
						while($data_kategori_kompetisi=mysqli_fetch_array($query_kategori_kompetisi)){
						?>
							<button class="tablinks" onclick="openCountry(event, '<?php echo $data_kategori_kompetisi['kode_negara']; ?>')" id="defaultOpen" >
								<?php echo $data_kategori_kompetisi['singkatan']; ?>	
							</button>
						<?php
						}
						?>
					</div>
					<?php 
						$query_kategori_kompetisi=mysqli_query($koneksi, "SELECT * FROM kategori_kompetisi"); 
						while($data_kategori_kompetisi=mysqli_fetch_array($query_kategori_kompetisi)){
							$datakompetisiterbaru = mysqli_fetch_array(mysqli_query($koneksi, "select max(kompetisi.id_kompetisi) from 
																						kompetisi where
																						kompetisi.id_kategori_kompetisi = $data_kategori_kompetisi[id_kategori_kompetisi]"));
							$id_kompetisi_terbaru = ($datakompetisiterbaru[0]);
							if($id_kompetisi_terbaru!=0){
							$datamusimliga = mysqli_fetch_array(mysqli_query($koneksi, "select * from 
																						kategori_kompetisi,kompetisi where
																						kategori_kompetisi.id_kategori_kompetisi = kompetisi.id_kategori_kompetisi and
																						kompetisi.id_kompetisi = $id_kompetisi_terbaru"));
							}
						?>
						<!-- Tab content -->
						<div id="<?php echo $data_kategori_kompetisi['kode_negara']; ?>" class="tabcontent">
							<?php						
							$cek_klasemen = mysqli_num_rows(mysqli_query($koneksi, "select * from kompetisi where id_kategori_kompetisi = $data_kategori_kompetisi[id_kategori_kompetisi]"));
							if($cek_klasemen < 1){
								?>
								<tr>
									<td colspan="7" align="center" style="padding:10px;">Data Tidak Ditemukan</td>
								</tr>
								<?php
							}else{
								?>
								<h4><?php echo "Klasemen ".$datamusimliga['nama_kategori_kompetisi']." musim ".$datamusimliga['musim']; ?></h4>
								<table class="klasemen">
									<tr style="background-color:#00a8f6;">
									<th style="width:15%;">#</th>
									<th style="width:70%;">Team</th>
									<th style="width:15%;">poin</th>
									</tr>		
										<?php						
										$no = 0;						
										$query_klasemen = mysqli_query($koneksi,"select * from team,klasemen where 
																				team.id_team = klasemen.id_team and
																				klasemen.id_kompetisi=$id_kompetisi_terbaru 
																				ORDER BY poin DESC, selisih_gol DESC");	
										while($data_klasemen = mysqli_fetch_array($query_klasemen)){
											$no++;
										echo "<tr align='center'>
										<td align='center'>$no</td>
										<td align='left'>$data_klasemen[nama_team]</td>
										<td>$data_klasemen[poin]</td>
										</tr>";
										}?>
								</table>
						<?php
							}
						?>
						</div>
						<?php
						}
						?>
				</div>					 
				
			</div>
			<div class="clear"></div>
			<script>			
			// script tab klasemen
			function openCountry(evt, countryName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(countryName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpen").click();
			
			// script tab berita
			function openberita(evt, beritaName) {
				var i, tabcontentberita, tablinksberita;
				tabcontentberita = document.getElementsByClassName("tabcontentberita");
				for (i = 0; i < tabcontentberita.length; i++) {
					tabcontentberita[i].style.display = "none";
				}
				tablinksberita = document.getElementsByClassName("tablinksberita");
				for (i = 0; i < tablinksberita.length; i++) {
					tablinksberita[i].className = tablinksberita[i].className.replace(" active", "");
				}
				document.getElementById(beritaName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpenberita").click();
			
			// script tab forum
			function openforum(evt, forumName) {
				var i, tabcontentforum, tablinksforum;
				tabcontentforum = document.getElementsByClassName("tabcontentforum");
				for (i = 0; i < tabcontentforum.length; i++) {
					tabcontentforum[i].style.display = "none";
				}
				tablinksforum = document.getElementsByClassName("tablinksforum");
				for (i = 0; i < tablinksforum.length; i++) {
					tablinksforum[i].className = tablinksforum[i].className.replace(" active", "");
				}
				document.getElementById(forumName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpenforum").click();
			</script>
		</div>
		
		<div id="footer">
		<a href="?page=about">Tentang</a>
		<span class style="color:#000000;">|</span><br><br>
		Copyright &copy; <?php echo date("Y");?> - Berita Sepakbola
		</div>
	</div>
</body>
</html>
