<?php
$page = @$_GET['page'];
$action = @$_GET['action'];
$actionteam = @$_GET['actionteam'];
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
$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kompetisi where id_kompetisi = '$id_kompetisi'"));
$datapertandingan = mysqli_fetch_array(mysqli_query($koneksi, "select * from pertandingan where id_pertandingan = '$id_pertandingan'"));
$datateam = mysqli_fetch_array(mysqli_query($koneksi, "select * from team where id_team = '$id_team'"));
if($page == "berita"){
	if($action == "view"){
		include "admin/berita.php";
	}else if($action == "tambah"){
		include "admin/tambah_berita.php";
	}else if($action == "edit"){
		if($kdberita == $databerita['id_berita']&&$kdberita != ""){
			include "admin/edit_berita.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "hapus"){
		if($kdberita == $databerita['id_berita']&&$kdberita != ""){
			include "admin/hapus_berita.php";
		}else{
			include "user/notfound.php";
		}
	}else{
		include "user/notfound.php";
	}	
}else if($page == "member"){
	if($action == "view"){
		include "admin/member.php";
	}else if($action == "tambah"){
			include "admin/tambah_member.php";
	}else if($action == "edit"){
		if($idmember == $datamember['id_member']&&$idmember != ""){
			include "admin/edit_member.php";
		}else{
			include "user/notfound.php";
		}
	}else{
			include "user/notfound.php";
	}
}else if($page == "forum"){
	if($action == "view"){
		include "admin/forumadmin.php";
	}else if($action == "hapus"){
		if($id_forum == $dataforum['id_forum']&&$id_forum != ""){
			include "admin/hapus_forum.php";
		}else{
			include "user/notfound.php";
		}
	}else{
			include "user/notfound.php";
	}
}else if($page == "laporan"){
	if($action == "view"){
		include "admin/laporan.php";
	}else if($action == "viewlaporan"){
		if($idlaporan == $datalaporan['id_laporan']&&$idlaporan != ""){
			include "admin/detail_laporan.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "hapus"){
		if($idlaporan == $datalaporan['id_laporan']&&$idlaporan != ""){
			include "admin/hapus_laporan.php";
		}else{
			include "user/notfound.php";
		}
	}else{
			include "user/notfound.php";
	}
}else if($page == "kategori_kompetisi"){
	if($action == "view"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
		include "admin/kompetisi_admin.php";	
		}else{
			include "user/notfound.php";
		}
	}else if($action == "tambahkompetisi"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
			include "admin/tambah_kompetisi.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "kompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			include "admin/detail_kompetisi.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "editkompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			include "admin/edit_kompetisi.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "hapuskompetisi"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			include "admin/hapus_kompetisi.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "tambahteam"){
		if($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi']&&$id_kategori_kompetisi != ""){
			include "admin/tambah_team.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "editteam"){
		if($id_team == $datateam['id_team']&&$id_team != ""){
			include "admin/edit_team.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "hapusteam"){
		if($id_team == $datateam['id_team']&&$id_team != ""){
			include "admin/hapus_team.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "tambahjadwal"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			include "admin/tambah_jadwal.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "resetjadwal"){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
			include "admin/reset_jadwal.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "hapusjadwal" && $id_pertandingan == $datapertandingan['id_pertandingan']){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
		include "admin/hapus_jadwal.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "editjadwal" && $id_pertandingan == $datapertandingan['id_pertandingan']){
		if($id_pertandingan == $datapertandingan['id_pertandingan']&&$id_pertandingan != ""){
		include "admin/edit_jadwal.php";
		}else{
			include "user/notfound.php";
		}
	}else if($action == "pilihteam"){
		if($id_kompetisi == $datakompetisi['id_kompetisi']&&$id_kompetisi != ""){
			include "admin/pilih_team.php";
		}else{
			include "user/notfound.php";
		}
	}else{
		include "user/notfound.php";
	}		
}else if($page == ""){
	include "admin/home_admin.php";
}else{
	include "user/notfound.php";
}
			?>