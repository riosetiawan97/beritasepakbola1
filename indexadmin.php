<?php
@session_start();
include "config/koneksi.php";
include "config/waktu.php";
if(@$_SESSION['admin']){
$data_laporan = mysqli_num_rows(mysqli_query($koneksi, "select * from laporan"));
?>
<html>
<head>
<?php
include "headeradmin.php";
?>
</head>
<body>
	<div id="canvas">
		<div id="header">
			<img src="headeradmin.jpg" style="height:100%; width:1200px;"></img>
		</div>
		<div id="menu">
				<div class="utama"><a>Administrator</a></div>	
				<div class="utama right">
					<?php
					$member_terlogin = @$_SESSION['admin'];
					$sql_member = mysqli_query($koneksi, "select * from member where id_member = '$member_terlogin'") or die (mysqli_error());
					$data_member = mysqli_fetch_array($sql_member);
					?>
					<a><?php echo $data_member['nama_lengkap']?></a>
					<div class="dropdowncontent">
						<a href="index.php?page=editprofil">Edit Profil Saya</a>
						<a style="background-color: #f60;" href="logout.php">Logout</a>
					</div>
				</div>
				<div class="utama right">
				<a href="index.php">Lihat Web</a></div>
		</div>	
		<div id="isi">
			<div id="sidebar_left">
				<ul>
				<li class="utama"><a href="indexadmin.php">Home Admin</a></li>	
				<li class="utama"><a href="?page=berita&action=view">Berita</a></li>
				<li class="utama"><a href="?page=member&action=view">Member</a></li>
				<li class="utama"><a href="?page=forum&action=view">Forum</a></li>
				<li class="utama"><a href="?page=laporan&action=view">Laporan <?php echo "($data_laporan)";?></a></li>
				<li class="utama"><a href="?page=kategori_kompetisi&id_kategori_kompetisi=1&action=view">Kompetisi</a></li>
				</ul>
			</div>
			<div id="sidebar_right">
			<?php
				include "isi_admin.php";
			?>
			</div>
		</div>
		<div class="clear"></div>
		<div id="footer">
		Copyright &copy; <?php echo date("Y");?> - Berita Sepakbola
		</div>
	</div>
</body>
</html>
<?php
					}else{
						header("location: index.php");
					}?>