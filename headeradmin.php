<?php
$page = @$_GET['page'];
$action = @$_GET['action'];
$id_kategori_kompetisi = @$_GET['id_kategori_kompetisi'];
$id_kompetisi = @$_GET['id_kompetisi'];
$id_team = @$_GET['id_team'];
$id_pertandingan = @$_GET['id_pertandingan'];
$kdberita = @$_GET['kdberita'];
$id_forum = @$_GET['id_forum'];
$idmember = @$_GET['idmember'];
$idlaporan = @$_GET['idlaporan'];
$databerita = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita where id_berita = '$kdberita'"));
$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "select * from forum where id_forum = '$id_forum' and id_balasan is NULL"));
$datamember = mysqli_fetch_array(mysqli_query($koneksi, "select * from member where id_member = '$idmember'"));
$datalaporan = mysqli_fetch_array(mysqli_query($koneksi, "select * from laporan where id_laporan = '$idlaporan'"));
$datakategori_kompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_kompetisi where id_kategori_kompetisi = '$id_kategori_kompetisi'"));
$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_kompetisi,kompetisi where kategori_kompetisi.id_kategori_kompetisi=kompetisi.id_kategori_kompetisi and kompetisi.id_kompetisi = '$id_kompetisi'"));
$datapertandingan = mysqli_fetch_array(mysqli_query($koneksi, "select * from pertandingan where id_pertandingan = '$id_pertandingan'"));
$datateam = mysqli_fetch_array(mysqli_query($koneksi, "select * from team where id_team = '$id_team'"));
if($page == "berita"){
	if($action == "view"){
		echo "<title>Berita | Admin Berita Sepakbola</title>";
	}else if($action == "tambah"){
		echo "<title>Tambah Berita | Admin Berita Sepakbola</title>";
	}else if($action == "edit"){
		if($kdberita == $databerita['id_berita']&&$kdberita != ""){
			echo "<title>Edit Berita : $databerita[judul]| Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "hapus"){
		if($kdberita == $databerita['id_berita']&&$kdberita != ""){
			echo "<title>Hapus Berita : $databerita[judul]| Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else{
		echo "<title>Admin Berita Sepakbola</title>";
	}	
}else if($page == "member"){
	if($action == "view"){
		echo "<title>Member | Admin Berita Sepakbola</title>";
	}else if($action == "tambah"){
		echo "<title>Tambah Member | Admin Berita Sepakbola</title>";
	}else if($action == "hapus"){
		if($idmember == $datamember['id_member']&&$idmember != ""){
			echo "<title>Hapus Member : $datamember[username] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else{
		echo "<title>Admin Berita Sepakbola</title>";
	}
}else if($page == "forum"){
	if($action == "view"){
		echo "<title>Forum | Admin Berita Sepakbola</title>";
	}else if($action == "hapus"){
		if($id_forum == $dataforum['id_forum']&&$id_forum != ""){
			echo "<title>Hapus Member : $dataforum[judulforum] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else{
		echo "<title>Admin Berita Sepakbola</title>";
	}
}else if($page == "laporan"){
	if($action == "view"){
		echo "<title>Laporan | Admin Berita Sepakbola</title>";
	}else if($action == "viewlaporan"){
		if($idlaporan == $datalaporan['id_laporan']&&$idlaporan != ""){
			echo "<title>Laporan | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "hapus"){
		if($idlaporan == $datalaporan['id_laporan']&&$idlaporan != ""){
			echo "<title>Hapus Laporan | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else{
		echo "<title>Admin Berita Sepakbola</title>";
	}
}else if($page == "kategori_kompetisi"){
	if($action == "view"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
			echo "<title>$datakategori_kompetisi[nama_kategori_kompetisi] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "tambahkompetisi"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
			echo "<title>Tambah Kompetisi $datakategori_kompetisi[nama_kategori_kompetisi] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "kompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			echo "<title>$datakompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "editkompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			echo "<title>$datakompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "hapuskompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			echo "<title>$datakompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "tambahteam"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
			echo "<title>Tambah Team $datakategori_kompetisi[nama_kategori_kompetisi] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "editteam"){
		if($id_team == $datateam['id_team']&&$id_team != ""){
			echo "<title>Edit Team $datateam[nama_team] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "hapusteam"){
		if($id_team == $datateam['id_team']&&$id_team != ""){
			echo "<title>Edit Team $datateam[nama_team] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "tambahjadwal"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			echo "<title>Tambah Jadwal $datakompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "resetjadwal"){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
			echo "<title>Reset Jadwal | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "hapusjadwal" && $id_pertandingan == $datapertandingan['id_pertandingan']){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
			echo "<title>Hapus Jadwal | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "editjadwal" && $id_pertandingan == $datapertandingan['id_pertandingan']){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
			echo "<title>Edit Jadwal | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else if($action == "pilihteam"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			echo "<title>Pilih Team $datakompetisi[nama_kategori_kompetisi] $datakompetisi[musim] | Admin Berita Sepakbola</title>";
		}else{
			echo "<title>Admin Berita Sepakbola</title>";
		}
	}else{
		echo "<title>Admin Berita Sepakbola</title>";
	}						
}else if($page == ""){
	echo "<title>Admin Berita Sepakbola</title>";
}else{
	echo "<title>Admin Berita Sepakbola</title>";
}
?>
			
	<link rel="icon" href="icon/iconheader.png">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/indexadmin.css"/>