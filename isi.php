<?php  	  
$jenis = @$_POST['jenis'];
$inputan_pencarian=@$_GET['cari'];
if($inputan_pencarian !=""){
	include "user/cari.php";
}else{
	$page = @$_GET['page'];	
	$id_kategori_berita= @$_GET['id_kategori_berita'];
	$id_berita= @$_GET['id_berita'];
	$id_forum= @$_GET['id_forum'];
	$id_komentar= @$_GET['id_komentar'];
	$id_kategori_kompetisi= @$_GET['id_kategori_kompetisi'];
	$id_kompetisi= @$_GET['id_kompetisi'];
	$action = @$_GET['action'];
	$datakategori_berita = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_berita where id_kategori_berita = '$id_kategori_berita'"));
	$databerita = mysqli_fetch_array(mysqli_query($koneksi, "select * from berita where id_berita = '$id_berita'"));
	$dataforum = mysqli_fetch_array(mysqli_query($koneksi, "select * from forum where id_forum = '$id_forum' and id_balasan is NULL"));
	$datakategori_kompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_kompetisi where id_kategori_kompetisi= '$id_kategori_kompetisi'"));
	$datakompetisi = mysqli_fetch_array(mysqli_query($koneksi, "select * from kompetisi where id_kompetisi = '$id_kompetisi'"));
	if($page == "berita"){
		if($id_kategori_berita==""&& $id_berita==""){
			include "user/beritautama.php";
		}else if($id_kategori_berita==$datakategori_berita['id_kategori_berita']&& $id_berita=="" ){
			include "user/kategori_berita.php";
		}else if($id_kategori_berita==$databerita['id_kategori_berita'] && $id_berita==$databerita['id_berita']){
			include "user/detailberita.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "forum"){
		if($id_forum==""){
			if($action ==""){
				include "user/forum.php";
			}else if($action == "tambah"){
				include "user/tambah_topik.php";
			}else if($action == "infoforum"){
				include "user/infoforum.php";
			}
		}else if($id_forum== $dataforum['id_forum']){
			include "user/detailtopik.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "editprofil"){
		include "user/editprofil.php";			 
	}else if($page == "gantipassword"){
		include "user/gantipassword.php";			 
	}else if($page == "editkomentar"){
		if($id_komentar!=""){
			include "user/editkomentar.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "hapuskomentar"){
		if($id_komentar!=""){
			include "user/hapuskomentar.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "editforum"){
		if($id_forum!=""){
			include "user/editforum.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "hapusforum"){
		if($id_forum!=""){
			include "user/hapusforum.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "laporpost"){
		if($id_forum!=""){
			include "user/lapor.php";
		}elseif($id_komentar!=""){
			include "user/lapor.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "kompetisi"){
		if($id_kategori_kompetisi == "" || $id_kompetisi == ""){
		include "user/notfound.php";
		}elseif($id_kategori_kompetisi == $datakategori_kompetisi['id_kategori_kompetisi'] && $id_kompetisi == $datakompetisi['id_kompetisi']){
			include "user/kompetisi_utama.php";
		}else{
			include "user/notfound.php";
		}
	}else if($page == "about"){
		include "user/about.php";			 
	}else if($page == ""){
		include "user/beritautama.php";
	}else{
		include "user/notfound.php";
	}
}
?>

			